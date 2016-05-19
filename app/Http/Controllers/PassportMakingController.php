<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PassportMaking;
use Auth;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PassportMakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passport_makings = PassportMaking::whereManagerId(Auth::user()->id)->get();
        return view('passportmaking.index')
                    ->with('title', 'Passport Makings')->with('passport_makings', $passport_makings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('passportmaking.create')
                    ->with('title', 'Create Passport Making');
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
            'broker_name'       => 'required',
            'amount_of_money'       => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $passport_making = new PassportMaking;
            $passport_making->name = $data['name'];
            $passport_making->passport_no = $data['passport_no'];
            $passport_making->broker_name = $data['broker_name'];
            $passport_making->amount_of_money = $data['amount_of_money'];
            $passport_making->manager_id = Auth::user()->id;
            
            
            if($passport_making->save()){
                // Auth::logout();
                return redirect()->route('passportmaking.index')
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
        $passport_receive = PassportMaking::find($id);
        return view('passportmaking.edit')
                    ->with('title', 'Create Passport Making');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passport_making = PassportMaking::find($id);
        return view('passportmaking.edit')
                    ->with('title', 'Update Passport Making')->with('passport_making', $passport_making);
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
            'broker_name'       => 'required',
            'amount_of_money'       => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $passport_making = PassportMaking::find($id);
            $passport_making->name = $data['name'];
            $passport_making->passport_no = $data['passport_no'];
            $passport_making->broker_name = $data['broker_name'];
            
            $passport_making->amount_of_money = $data['amount_of_money'];
            // $passport_making->manager_id = Auth::user()->id;
            
            
            if($passport_making->save()){
                // Auth::logout();
                return redirect()->route('passportmaking.index')
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
            $passport_making = PassportMaking::find($id);
            $passport_making->delete();
            return redirect()->route('passportmaking.index')
                            ->with('success','Deleted successfully.');
        } catch (Exception $e) {
            
        }
    }
}
