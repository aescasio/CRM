<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'nick_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'first_name' => 'required|max:255',
            'middle_initial' => 'required|max:1',
            'last_name' => 'required|max:255',
            'photo' => 'image|mimes:jpg,jpeg,gif,png,bmp'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        if(isset($data['photo'])){
            return User::create([
                'nick_name' => $data['nick_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'first_name' => $data['first_name'],
                'middle_initial' => $data['middle_initial'],
                'last_name' => $data['last_name'],
                'photo' => $data['photo'],
            ]);
        }else{
            return User::create([
                'nick_name' => $data['nick_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'first_name' => $data['first_name'],
                'middle_initial' => $data['middle_initial'],
                'last_name' => $data['last_name']
            ]);
        }

    }
}
