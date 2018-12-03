<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Employee;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
		$users = DB::table('users')->paginate(5);
		
		return view('Users.users', compact('users'));
	}
	public function create()
	{
		return view('Users.create');
	}
	public function store(Request $request)
	{	
			$messages = [
				'name.required' => 'Name is required',        
				'name.regex' => 'Name has invalid format',        
				'address.required' => 'Address is required',
				'username.required' => 'Username is required',
				'email.required' => 'Email is required',
//				'email.email' => 'Email should have a valid email address',
//				'email.unique' => 'Email should have unique email address',
				'password.required' => 'Password is required',
				'password.min' => 'Password must be of 6 characters',
				'con_password.required' => 'Retype Password is required',
				'con_password.same' => 'Retype Password and Password should be same',
				'con_password.min' => 'Retype Password must be of 6 characters',
				'phone.required' => 'Phone Number is required',
				'phone.integer' => 'Enter correct Phone Number',
				'phone.digits' => 'Enter correct Phone Number',
			
		];
		
		
			$request->validate([
				'name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'username' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users',
				'password' => 'required|string|min:6',
				'con_password' => 'required|string|min:6|same:password',
				'address' => 'required|string|max:255',
				'phone' => 'required|numeric|phone|digits:10',  
			], $messages);
		
			User::create([
            	'name' => $request->name,
            	'username' => $request->username,
            	'address' => $request->address,
            	'email' => $request->email,
            	'phone' => $request->phone,
            	'remember_token' => $request->_token,
            	'password' => Hash::make($request->password),
        	]);
		
	\LogActivity::addToLog('User added successfully');		
	$request->session()->flash('alert-success', 'User added successfully !!!');	
	return redirect('/users');
	}
	public function edit(Request $request)
	{
		$user = User::findOrFail($request->id);
		//dd($user->id);
		return view('Users.edit', compact('user',$user));
	}
	public function update(Request $request)
	{		
		$messages = [
				'name.required' => 'Full Name is required', 
				'name.regex' => 'Name has invalid format',
				'address.required' => 'Address is required',
				'username.required' => 'Username is required',
				'email.required' => 'Email is required',
//				'email.email' => 'Email should have a valid email address',
//				'email.unique' => 'Email should have unique email address',
				'phone.required' => 'Phone Number is required',
				'phone.integer' => 'Enter correct Phone Number',
				'phone.digits' => 'Enter correct Phone Number',
			
		];
		$request->validate([
				'name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'username' => 'required|string|max:255',
				'email' => 'required|string|email|max:255',
				'address' => 'required|string|max:255',
				'phone' => 'required|numeric|phone|digits:10',  
			], $messages);
//		dd($request);
		$user = User::find($request->id);

			$user->name = $request->name;
    		$user->username = $request->username;
    		$user->address = $request->address;
    		$user->email = $request->email;
    		$user->phone = $request->phone;
    		$user->password = $user->password;
			$user->save();
	
	\LogActivity::addToLog('User updated successfully');	
	$request->session()->flash('alert-warning', 'User updated successfully !!!');
	return redirect('/users');
	}
	
	public function delete(Request $request)
	{
		$user = DB::table('users')->where('id',$request->get('id'))->get()->toArray();
		foreach($user as $u)
		{
			if($u->role_name == 'Company')
			{
				$company_id = DB::table('users')->where('id',$request->id)->pluck('company_id')->toArray();
				$cid = DB::table('company')->where('cid',$company_id);
				$cid->delete();
			}
			if($u->role_name == 'Team')
			{
				$team_id = DB::table('users')->where('id',$request->id)->pluck('team_id')->toArray();
				$tid = DB::table('team')->where('tid',$team_id);
				$tid->delete();
			}
			if($u->role_name == 'Employee')
			{
				$emp_id = User::find($request->id);
				$eid = Employee::find($emp_id->employee_id);
				//dd($emp_id->employee_id);
				$eid->delete();
			}
		}
		$users = User::find($request->get('id'));
		$users->delete();
		
		\LogActivity::addToLog('User deleted successfully');	
		$request->session()->flash('alert-danger', 'User deleted successfully !!!');
   		return redirect('/users');
	}
}
