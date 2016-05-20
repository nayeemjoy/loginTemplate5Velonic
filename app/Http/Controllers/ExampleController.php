<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use Auth;
class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examples = Example::all();
        return view('example.index')
                    ->with('title', 'Examples')->with('examples', $examples);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $statuses = [
            'disable' => 'Disable',
            'enable' => 'Enable'
        ];
        return view('example.create')
                    ->with('title', 'Create Example')->with('statuses',$statuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'title'              => 'required',
            'description'       => 'required',
            'status'       => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $example = new Example;
        $example->title = $data['title'];
        $example->description = $data['description'];
        $example->status = $data['status'];
        $example->user_id = Auth::user()->id;
        
        
        if($example->save()){
            return redirect()->route('example.index')
                        ->with('success','Created successfully.');
        }
        return redirect()->route('dashboard')
                    ->with('error',"Something went wrong.Please Try again.");
            
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $example = Example::find($id);
        return view('example.show')
                    ->with('title', 'Example')->with('example', $example);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuses = [
            'disable' => 'Disable',
            'enable' => 'Enable'
        ];
        $example = Example::find($id);
        return view('example.edit')
                    ->with('title', 'Update Example')->with('example', $example)->with('statuses',$statuses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $rules =[
            'title'              => 'required',
            'description'       => 'required',
            'status'       => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $example = Example::find($id);
        $example->title = $data['title'];
        $example->description = $data['description'];
        $example->status = $data['status'];

        if($example->save()){
            return redirect()->route('example.index')
                        ->with('success','Updated successfully.');
        }
        return redirect()->route('dashboard')
                    ->with('error',"Something went wrong.Please Try again.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $example = Example::find($id);
            $example->delete();
            return redirect()->route('example.index')
                            ->with('success','Deleted successfully.');
        } catch (Exception $e) {
            
        }
    }
}
