<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Company;
use App\User;
use App\Team;
use App\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
	{
		if(Auth::user()->role_name == 'Company')
		{
			$teams = DB::table('team')->join('users', 'team_id','=','tid')->join('company', 'team.company_id','=','cid')->where('team.company_id', Auth::user()->company_id)->where('role_name','Team')->paginate(5);
			//dd($teams);
			return view('Teams.teams', compact('teams'));
		}
		if(Auth::user()->role_name == 'Team')
		{
			$teams = DB::table('team')->join('users', 'team_id','=','tid')->join('company', 'team.company_id','=','cid')->where('team.team_id', Auth::user()->team_id)->where('role_name','Team')->paginate(5);
			//dd($teams);
			return view('Teams.teams', compact('teams'));
		}
		$teams = DB::table('team')->join('users', 'team_id','=','tid')->join('company', 'team.company_id','=','cid')->where('role_name','Team')->paginate(5);
		//dd($teams);
		return view('Teams.teams', compact('teams'));
	}
	public function create()
	{
		$companies = DB::table('company')->get()->toarray();
		if(Auth::user()->role_name == 'Company')
		{
			$company = DB::table('company')->where('cid', Auth::user()->company_id)->get()->toarray();
			return view('Teams.create', compact('company'));
		}
		return view('Teams.create', compact('companies'));
	}
	public function store(Request $request)
	{
			$messages = [
				'team_name.required' => 'Name is required',        
				'team_name.regex' => 'Name has invalid format',        
				'comp_name.required' => 'Company Name is required',        
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
				'phone.required' => 'Phone is required',
				'phone.integer' => 'Enter correct Phone Number',
				'phone.digits' => 'Enter correct Phone Number',
			
		];
		
			$request->validate([
				'team_name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'comp_name' => 'required|not_in:0',
				'username' => 'required|string|max:255',
            	'email' => 'required|string|email|max:255',
				'address' => 'required|string|max:255',
				'password' => 'required|string|min:6',
				'con_password' => 'required|string|min:6|same:password',
				'phone' => 'required|numeric|phone|digits:10',  
			], $messages);	
		
			//dd($request);
			
			$t = new Team();
			
    		$t->team_name = $request->team_name;
    		$t->company_id = $request->comp_name;	
			$t->save();
			
			//dd($request->team_email);
			$user = new User();
            $user->name = $request->team_name;
            $user->role_name = $request->role_name;
            $user->team_id = $t->tid;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->username = $request->username;
            $user->company_id = $request->comp_name;
            $user->remember_token = $request->_token;
            $user->password = Hash::make($request->password);
        	$user->save();
		
		\LogActivity::addToLog('Team added successfully');	
		$request->session()->flash('alert-success', 'Team added successfully !!!');
		return redirect('/teams');
	}
	public function edit(Request $request)
	{
		$team = Team::find($request->tid);
		$companies = DB::table('company')->get()->toarray();
		$t_user = User::find($request->id);
		//dd($comp->comp_name);
		return view('Teams.edit', compact('team','companies','t_user'));
	}
	public function update(Request $request)
	{
		$messages = [
				'team_name.required' => 'Name is required',        
				'team_name.regex' => 'Name has invalid format',        
				'comp_name.required' => 'Company Name is required',        
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
				'team_name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'comp_name' => 'required|not_in:0',
				'username' => 'required|string|max:255',
            	'email' => 'required|string|email|max:255',
				'address' => 'required|string|max:255',
				'phone' => 'required|numeric|phone|digits:10',  
			], $messages);		
		
		$user = User::find($request->id);
		$team = Team::find($request->tid);
		$emp = DB::table('employee')->where('team_id',$request->tid)->update(['company_id' => $request->comp_name]);
		$euser = DB::table('users')->where('team_id', $request->tid)->where('role_name', 'Employee')->update(['company_id' => $request->comp_name]);
		//dd($employee_user);
		
			$user->name = $request->team_name;
    		$user->username = $request->username;
    		$user->address = $request->address;
    		$user->email = $request->email;
    		$user->phone = $request->phone;
    		$user->company_id = $request->comp_name;
    		$user->password = $user->password;
			$user->save();
			
			$team->team_name = $request->team_name;
			$team->company_id = $request->comp_name;
			$team->save();
		
	\LogActivity::addToLog('Team updated successfully');	
	$request->session()->flash('alert-warning', 'Team updated successfully !!!');
	return redirect('/teams');
	}
	
	public function delete(Request $request)
	{
		//dd($request->tid);
		$team = Team::find($request->get('id'));
		$employee = DB::table('employee')->where('team_id', $request->get('id'))->get()->toArray();
		//dd($employee);
		$user = DB::table('users')->get()->toArray();
		//dd($user);
		foreach($user as $u)
		{
			if($u->team_id == $request->get('id'))
			{
				$id = User::find($u->id);
				//dd($uid);
				$id->delete();
			}
		}
		
		foreach($employee as $emp)
		{
			if($emp->team_id == $request->get('id'))
			{
				$emp_id = Employee::find($emp->emp_id);
				//dd($emp_id);
				$emp_id->delete();
			}
		}
		$team->delete();
		
		\LogActivity::addToLog('Team deleted successfully');	
		$request->session()->flash('alert-danger', 'Team deleted successfully !!!');
   		return response()->json(['success'=> 'Team has been deleted successfully.!']);
	}
	public function company_details()
	{
		$company_details = DB::table('company')->where('role_name','Company')->where('company_id', Auth::user()->company_id)->join('users', 'company_id','=','cid')->get()->toArray();
		$companies = DB::table('company')->get()->toArray();
		//dd($companies);
		return view('Teams.company_details', compact('company_details','companies'));
	}
	public function company_update(Request $request)
	{
		$employee = DB::table('employee')->where('team_id', Auth::user()->team_id)->update(['company_id' => $request->company_name]);
		$emp_user = DB::table('users')->where('team_id', Auth::user()->team_id)->where('role_name','Employee')->update(['company_id' => $request->company_name]);
		$team_user = DB::table('users')->where('team_id', Auth::user()->team_id)->where('role_name','Team')->update(['company_id' => $request->company_name]);
		$team = DB::table('team')->where('tid', Auth::user()->team_id)->update(['company_id' => $request->company_name]);
		
		\LogActivity::addToLog('Team updated its company successfully');	
		$request->session()->flash('alert-danger', 'Company updated successfully !!!');
   		return redirect('/company_details');
	}
}
