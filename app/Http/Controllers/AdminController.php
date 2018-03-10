<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $user = User::all();

        return view('admin')->withUser($user);
    }
    
    public function unverified(){
        $user = User::where('verified', false)->get();

        return view('admin.unverified')->withUser($user);
    }

    public function userManage(){
        $user = User::where('active', true)->get();

        return view('admin.user-manage')->withUser($user);
    }

    public function edit(Request $request, $id){
        return view('admin.user-edit');
    }

    public function updateStatus(Request $request, $id){

        $user = User::find($id);
        $user->update(['verified' => 1]);

        return redirect()->back();
    }

}
