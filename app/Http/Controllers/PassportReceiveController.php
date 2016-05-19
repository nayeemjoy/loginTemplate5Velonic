<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PassportReceive;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use Auth;
class PassportReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passport_receives = PassportReceive::whereManagerId(Auth::user()->id)->get();
        return view('passportreceive.index')
                    ->with('title', 'Passport Receives')->with('passport_receives', $passport_receives);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('passportreceive.create')
                    ->with('title', 'Create Passport Receives');
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
            $passport_receive = new PassportReceive;
            $passport_receive->name = $data['name'];
            $passport_receive->passport_no = $data['passport_no'];
            $passport_receive->broker_name = $data['broker_name'];
            $passport_receive->manager_id = Auth::user()->id;
            
            
            if($passport_receive->save()){
                // Auth::logout();
                return redirect()->route('passportreceive.index')
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
        $passport_receive = PassportReceive::find($id);
        return view('passportreceive.edit')
                    ->with('title', 'Create Passport Receives');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passport_receive = PassportReceive::find($id);
        return view('passportreceive.edit')
                    ->with('title', 'Update Passport Receives')->with('passport_receive', $passport_receive);
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
            $passport_receive = PassportReceive::find($id);
            $passport_receive->name = $data['name'];
            $passport_receive->passport_no = $data['passport_no'];
            $passport_receive->broker_name = $data['broker_name'];
            // $passport_receive->manager_id = Auth::user()->id;
            
            
            if($passport_receive->save()){
                // Auth::logout();
                return redirect()->route('passportreceive.index')
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
            $passport_receive = PassportReceive::find($id);
            $passport_receive->delete();
            return redirect()->route('passportreceive.index')
                            ->with('success','Deleted successfully.');
        } catch (Exception $e) {
            
        }
    }
}
