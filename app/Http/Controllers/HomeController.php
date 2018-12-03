<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\LogActivity;
use App\User;
use App\Team;
use App\Message;
use App\Employee;
use App\Company;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

	public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
		//dd($logs[4]);
		foreach($logs as $log)
		{
			$uname[] = User::find($log->user_id);
		}
		//dd($uname);
		foreach($uname as $n)
		{
			$names[] = $n->name;
		}
		
        return view('logActivity',compact('logs','names'));
    }
	
    public function index()
    {
		if(Auth::user()->role_name == 'Company')
		{
			$teams = DB::table('team')->where('company_id', Auth::user()->company_id)->get()->toArray();
			$employees = DB::table('employee')->where('company_id', Auth::user()->company_id)->get()->toArray();
			$total_teams = count($teams);
			$total_employees = count($employees);
			$tcd = DB::table('team')->where('company_id', Auth::user()->company_id)->pluck('created_at')->toArray();
			//dd($tcd);
			$ecd = DB::table('employee')->where('company_id', Auth::user()->company_id)->pluck('created_at')->toArray();
			$tmonth =  [];
			foreach($tcd as $key => $value)
			{
				$tmonth[$key] = date("m",strtotime($value));
			}
			//dd($tmonth);
			$emonth =  [];
			foreach($ecd as $key => $value)
			{
				$emonth[$key] = date("m",strtotime($value));
			}
			//dd($emonth);
			return view('home', compact('total_teams','total_employees','tmonth','emonth'));
		}
		
		if(Auth::user()->role_name == 'Team')
		{
			$employees = DB::table('employee')->where('team_id', Auth::user()->team_id)->get()->toArray();
			$total_employees = count($employees);
			//dd($total_employees);
			$ecd = DB::table('employee')->where('team_id', Auth::user()->team_id)->pluck('created_at')->toArray();
			//dd($ecd);
			$emonth =  [];
			foreach($ecd as $key => $value)
			{
				$emonth[$key] = date("m",strtotime($value));
			}
			$cd = DB::table('team')->where('company_id', Auth::user()->company_id)->pluck('created_at')->toArray();
			//dd($cd);
			$month =  [];
			foreach($cd as $key => $value)
			{
				$month[$key] = date("m",strtotime($value));
			}
			return view('home', compact('total_employees','emonth','month'));
		}
		
		if(Auth::user()->role_name == 'Admin')
		{	
			//dd($user);
			$employees = DB::table('employee')->get()->toArray();
			$users = DB::table('users')->get()->toArray();
			$companies = DB::table('company')->get()->toArray();
			$teams = DB::table('team')->get()->toArray();
			$total_users = count($users);
			$total_companies = count($companies);
			$total_teams = count($teams);
			$total_employees = count($employees);

			$ecd = DB::table('employee')->pluck('created_at')->toArray();
			$emonth =  [];
			foreach($ecd as $key => $value)
			{
				$emonth[$key] = date("m",strtotime($value));
			}
			$cd = DB::table('company')->pluck('created_at')->toArray();
			$month =  [];
			foreach($cd as $key => $value)
			{
				$month[$key] = date("m",strtotime($value));
			}
			$tcd = DB::table('team')->pluck('created_at')->toArray();
			$tmonth =  [];
			foreach($tcd as $key => $value)
			{
				$tmonth[$key] = date("m",strtotime($value));
			}
			//dd($month);
			return view('home', compact('total_users','total_companies','total_teams','total_employees','month','tmonth','emonth'));
		}
		if(Auth::user()->role_name == 'Employee')
		{	
			$company = DB::table('company')->join('users','cid','company_id')->where('role_name','Company')->where('cid', Auth::user()->company_id)->get()->toArray();
			//dd($company);
			$team = DB::table('team')->join('company','cid','company_id')->join('users','tid','team_id')->where('role_name','Team')->where('tid', Auth::user()->team_id)->get()->toArray();
			$ecd = DB::table('employee')->where('team_id', Auth::user()->team_id)->pluck('created_at')->toArray();
			$emonth =  [];
			foreach($ecd as $key => $value)
			{
				$emonth[$key] = date("m",strtotime($value));
			}
			$cd = DB::table('team')->where('company_id', Auth::user()->company_id)->pluck('created_at')->toArray();
			$month =  [];
			foreach($cd as $key => $value)
			{
				$month[$key] = date("m",strtotime($value));
			}
			//dd($cd);
			return view('home', compact('emonth','month','total_employees','company','team'));
		}
  
    }
	
	public function profile()
    {
		if(Auth::user()->role_name == 'Company')
		{
			$comp_url = DB::table('company')->where('cid', Auth::user()->company_id)->pluck('comp_url')->toArray();
			foreach($comp_url as $c)
			{
				$comp = $c;
			}
			return view('profile', compact('comp'));
		}
		if(Auth::user()->role_name == 'Team')
		{
			$team = DB::table('team')->where('tid', Auth::user()->team_id)->get()->toArray();
			$t_comp = DB::table('company')->where('cid', Auth::user()->company_id)->pluck('comp_name')->toArray();
			foreach($t_comp as $c)
			{
				$comp = $c;
			}
			return view('profile', compact('team', 'comp'));
		}
		if(Auth::user()->role_name == 'Employee')
		{
			$emp = Employee::find(Auth::user()->employee_id);
			$comp = Company::find(Auth::user()->company_id);
			$team = Team::find(Auth::user()->team_id);
			//dd($team);
			$designation = DB::table('designation')->where('des_id', $emp->emp_designation)->get()->toArray();
			//dd($emp->emp_image);
			return view('profile', compact('emp','designation','comp','team'));
		}
	
        return view('profile');
    }
	
	public function update_profile()
    {
        
		if(Auth::user()->role_name == 'Team')
		{
			$team = Team::find(Auth::user()->team_id);
			$companies = DB::table('company')->get()->toarray();
			//dd($companies);
			return view('updateProfile', compact('team','companies'));
		}
		if(Auth::user()->role_name == 'Company')
		{
			$company = Company::find(Auth::user()->company_id);
			//dd($company);
			return view('updateProfile', compact('company'));
		}
		if(Auth::user()->role_name == 'Employee')
		{
			$emp = Employee::find(Auth::user()->employee_id);
			$companies = DB::table('company')->get()->toArray();
			$team = Team::find(Auth::user()->team_id);
			$designation = DB::table('designation')->get()->toArray();
			//dd($team->team_name);
			return view('updateProfile', compact('emp','designation','companies','team'));
		}
		if(Auth::user()->role_name == 'Admin')
		{
			return view('updateProfile');
		}
    }
	
	public function profile_updated(Request $request)
    {
		if(Auth::user()->role_name == 'Team')
		{
			$messages = [
				'team_name.required' => 'Team Name is required',        
				'team_name.regex' => 'Team Name has invalid format',   
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
				'address' => 'required|string|max:255',
            	'email' => 'required|string|email|max:255',
				'phone' => 'required|numeric|phone|digits:10',
			], $messages);
		
        $user = User::find($request->id);
		//dd($user);
			$user->name = $request->team_name;
    		$user->username = $request->username;
    		$user->address = $request->address;
    		$user->email = $request->email;
    		$user->phone = $request->phone;
    		$user->password = $user->password;
    		$user->company_id = $request->company_name;
			$user->save();
			
		$team = Team::find($request->tid);
		//dd($team);
			$team->team_name = $request->team_name;
    		$team->company_id = $request->company_name;
			$team->save();
			
		$employee = DB::table('employee')->where('team_id', Auth::user()->team_id)->update(['company_id' => $request->company_name]);
		$emp_user = DB::table('users')->where('team_id', Auth::user()->team_id)->where('role_name','Employee')->update(['company_id' => $request->company_name]);
		$team_user = DB::table('users')->where('team_id', Auth::user()->team_id)->where('role_name','Team')->update(['company_id' => $request->company_name]);
		
		\LogActivity::addToLog('Team profile updated');	
		$request->session()->flash('alert-warning', 'Your Profile Updated successfully !!!');
		return redirect('/profile');
	}
	if(Auth::user()->role_name == 'Admin')
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
				'address' => 'required|string|max:255',
				'username' => 'required|string|max:255',
            	'email' => 'required|string|email|max:255',
				'phone' => 'required|numeric|phone|digits:10',
			], $messages);
		
        $user = User::find($request->id);
			$user->name = $request->name;
    		$user->username = $request->username;
    		$user->address = $request->address;
    		$user->email = $request->email;
    		$user->phone = $request->phone;
    		$user->password = $user->password;
			$user->save();
		
		\LogActivity::addToLog('Admin profile updated');	
		$request->session()->flash('alert-warning', 'Your Profile Updated successfully !!!');
		return redirect('/profile');
	}
	if(Auth::user()->role_name == 'Employee')
	{	
		$messages = [
				'name.required' => 'Employee Name is required',        
				'name.regex' => 'Employee Name has invalid format',    
				'address.required' => 'Address is required',
				'username.required' => 'Username is required',
				'email.required' => 'Email is required',
//				'email.email' => 'Email should have a valid email address',
//				'email.unique' => 'Email should have unique email address',
				'phone.required' => 'Phone Number is required',
				'phone.integer' => 'Enter correct Phone Number',
				'phone.digits' => 'Enter correct Phone Number',	
				'emp_salary.integer' => 'Enter correct Salary',	
			];
		
		$request->validate([
				'name' =>  'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'address' => 'required|string|max:255',
				'username' => 'required|string|max:255',
            	'email' => 'required|string|email|max:255',
				'phone' => 'required|numeric|phone|digits:10',
				'emp_salary' => 'required|numeric',
			], $messages);
		
		$employee = Employee::find($request->employee_id);
		//dd($request->file('img'));
		if($request->emp_image != null)
			{
				$usersImage = public_path("storage/imgs/{$employee->emp_image}"); // get previous image from folder
				//dd($usersImage);
				if (File::exists($usersImage)) { // unlink or remove previous image from folder
					unlink($usersImage);
				}
        		$file = $request->emp_image;
				$filename = $file->getClientOriginalName(); 
				$path = $file->storeAs('public/imgs', $filename);
				$employee->emp_image = $filename;
			}
		
			$employee->emp_name = $request->name;
    		$employee->emp_address = $request->address;
    		$employee->email = $request->email;
    		$employee->emp_phone = $request->phone;
    		$employee->emp_designation = $request->emp_designation;
			$employee->company_id = $request->comp_name;
			$employee->team_id = $request->team_name;
			$employee->emp_salary = $request->emp_salary;
			$employee->save();
		
		$user = User::find($request->id);
			$user->name = $request->name;
    		$user->username = $request->username;
    		$user->address = $request->address;
    		$user->email = $request->email;
    		$user->phone = $request->phone;
    		$user->password = $user->password;
			$user->save();
		
		\LogActivity::addToLog('Employee profile updated');	
		$request->session()->flash('alert-warning', 'Your Profile Updated successfully !!!');
		return redirect('/profile');
	}
	if(Auth::user()->role_name == 'Company')
	{	
		$messages = [
				'comp_name.required' => 'Company Name is required',        
				'comp_name.regex' => 'Company Name has invalid format',   
				'comp_url.required' => 'Company Url is required', 
				'comp_url.url' => 'Company Url format is invalid', 
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
				'comp_name' => 'required|regex:/^[\s\w-]*$/|string|max:255',
				'comp_url' => 'required|url',
				'username' => 'required|string|max:255',
            	'email' => 'required|string|email|max:255',
				'address' => 'required|string|max:255',
				'phone' => 'required|numeric|phone|digits:10',
			], $messages);
		
        $user = User::find($request->id);
			$user->name = $request->comp_name;
    		$user->username = $request->username;
    		$user->address = $request->address;
    		$user->email = $request->email;
    		$user->phone = $request->phone;
    		$user->password = $user->password;
			$user->save();
		
		$company = Company::find($request->cid);
			$company->comp_name = $request->comp_name;
    		$company->comp_url = $request->comp_url;
			$company->save();
		
		\LogActivity::addToLog('Company profile updated');	
		$request->session()->flash('alert-warning', 'Your Profile Updated successfully !!!');
		return redirect('/profile');
		
	 }

    }
	
	public function delete_log(Request $request)
	{	
		$log = LogActivity::find($request->get('id'));
		$log->delete();
		$request->session()->flash('alert-danger', 'Log deleted successfully !!!');
   		return response()->json(['success'=> 'Activity Log has been deleted successfully.!']);
	}
}
