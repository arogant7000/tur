<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\Auth\UserActivationEmail;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_travel' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telp' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama_travel' => $data['nama_travel'],
            'nama_pemilik' => $data['nama_pemilik'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'telp' => $data['telp'],
            'provinsi' => $data['provinsi'],
            'kabupaten' => $data['kabupaten'],
            'alamat' => $data['alamat'],
            'active' => false,
            'verified' => false,
            'activation_token' => str_random(25)
        ]);
    }

    protected function registered(Request $request, $user)
    {
        //sending email
        event(new UserActivationEmail($user));

        $this->guard()->logout();

        return redirect()->route('login')->withSuccess('Registered. Please check your email to activate your account');
    }
}
