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
        $examples = Example::whereManagerId(Auth::user()->id)->get();
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
         return view('example.create')
                    ->with('title', 'Create Example');
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
            'name'              => 'required',
            'passport_no'       => 'required',
            'broker_name'       => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $example = new example;
            $example->name = $data['name'];
            $example->passport_no = $data['passport_no'];
            $example->broker_name = $data['broker_name'];
            $example->manager_id = Auth::user()->id;
            
            
            if($example->save()){
                // Auth::logout();
                return redirect()->route('example.index')
                            ->with('success','Created successfully.');
            }else{
                return redirect()->route('dashboard')
                            ->with('error',"Something went wrong.Please Try again.");
            }
        }
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
        return view('example.edit')
                    ->with('title', 'Example');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $example = Example::find($id);
        return view('example.edit')
                    ->with('title', 'Update Example')->with('example', $example);
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
            'name'              => 'required',
            'passport_no'       => 'required',
            'broker_name'       => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $example = Example::find($id);
            $example->name = $data['name'];
            $example->passport_no = $data['passport_no'];
            $example->broker_name = $data['broker_name'];
            // $example->manager_id = Auth::user()->id;
            
            
            if($example->save()){
                // Auth::logout();
                return redirect()->route('example.index')
                            ->with('success','Updated successfully.');
            }else{
                return redirect()->route('dashboard')
                            ->with('error',"Something went wrong.Please Try again.");
            }
        }
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
