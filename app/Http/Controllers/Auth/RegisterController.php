<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/login';

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
		$messages = [
			'name.required' => 'Full Name is required', 
			'name.regex' => 'Name has invalid format',  
			'address.required' => 'Address is required',
			'username.required' => 'Username is required',
			'email.required' => 'Email is required',
//			'email.email' => 'Email should have a valid email address',
//			'email.unique' => 'Email should have unique email address',
			'password.required' => 'Password is required',
			'password.min' => 'Password must be of 6 characters',
			'con_password.required' => 'Retype Password is required',
			'con_password.same' => 'Retype Password and Password should be same',
			'con_password.min' => 'Retype Password must be of 6 characters',
			'phone.required' => 'Phone is required',
			'phone.integer' => 'Enter correct Phone Number',
			'phone.digits' => 'Enter correct Phone Number',
			
		];

		$validator = Validator::make($data, [
			'name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
			'username' => 'required|string|max:255',
           	'email' => 'required|string|email|max:255|unique:users',
           	'password' => 'required|string|min:6',
           	'con_password' => 'required|string|min:6|same:password',
			'address' => 'required|string|max:255',
			'phone' => 'required|numeric|phone|digits:10',  
		], $messages);

		return $validator;
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
            'name' => $data['name'],
            'provider' => 'null',
            'username' => $data['username'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'remember_token' => $data['_token'],
            'password' => Hash::make($data['password']),
        ]);
        
    }
}
