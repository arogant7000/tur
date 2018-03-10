<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','userLogout');
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();

        return redirect('/');
    }

   protected function validateLogin(Request $request){
       $this->validate($request, [
           $this->username() => [
               'required','string',
               Rule::exists('users')->where(function ($query) {
                   $query->where('verified', true);
               })
            ],
            'password' => 'required|string',
        ], $this->validationError());
   }

    
   public function validationError()
   {
       return [
            $this->username() . '.exists' => 'Anda akan bisa login setelah akun anda di verifikasi'
       ];
   }
}
