<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                //'username' => 'required|string|unique:users',
                //'g-recaptcha-response' => 'required|captcha',
                'firstname' => 'required',
                'surname' => 'required',
                'email' => 'required|string|unique:users',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        
        $user = User::create([
                //'username' => $data['username'],
                'firstname' => $data['firstname'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'user_group_id'=>2
        ]);
        
        

        return $user;
    }

    /**
     * Register user
     * 
     * @param Request $request
     * @return type
     */
    public function register(Request $request) {

        $validator = $this->validator($request->all());
        
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        // create the user
        $user = $this->create($request->all());
        // process the activation email for the user
        //$this->queueActivationKeyNotification($user);
        // we do not want to login the new user
        return redirect('/login')->with('success', 'Registration successful,please login with your email and password');
    }

}
