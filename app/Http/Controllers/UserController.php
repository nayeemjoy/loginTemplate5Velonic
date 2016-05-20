<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Validator;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('id', '!=', '1')->get();
        return view('user.index')
                    ->with('title', 'Managers')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create')
                    ->with('title', 'Create Manager');
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
            'username'              => 'required|unique:users,username',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $user = new User;
            $user->username = $data['username'];
            // $user->email = $data['pasword'];
            $user->password = Hash::make($data['password']);
            
            if($user->save()){
                $manager = Role::find(2);
                $user->attachRole($manager);
                // Auth::logout();
                return redirect()->route('user.index')
                            ->with('success','Created successfully.');
            }else{
                return redirect()->route('dashboard')
                            ->with('error',"Something went wrong.Please Try again.");
            }
        }
    }

    /**
     * Display the profile Info.
     *
     * @param  none
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
         return view('auth.profile')
                    ->with('title', 'Profile')->with('user', Auth::user());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $user = User::find($id);
            $user->delete();
            return redirect()->route('user.index')
                            ->with('success','Deleted successfully.');
        } catch (Exception $e) {
            
        }
    }
}
