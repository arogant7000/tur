<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }


    // get login page
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //validasi form data login
            $this->validate($request ,[
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
        
        //proses login
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                 //jika success
                 return redirect()->intended(route('admin.dashboard'));
        }      
        //jika gagal
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
