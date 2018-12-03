<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Team;
use App\Company;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function index()
	{
		if(Auth::user()->role_name == 'Team')
		{
			$companies = DB::table('users')->where('role_name','Company')->where('company_id', Auth::user()->company_id)->join('company', 'company_id','=','cid')->paginate(5);
			//dd($companies);
			return view('Company.companies', compact('companies'));
		}
		$companies = DB::table('users')->where('role_name','Company')->join('company', 'company_id','=','cid')->paginate(5);
		//dd($companies);
		return view('Company.companies', compact('companies'));
	}
	public function create()
	{
		return view('Company.create');
	}
	public function store(Request $request)
	{
			$messages = [
				'comp_name.required' => 'Name is required',                 
				'comp_name.regex' => 'Name has invalid format',                 
				'comp_url.required' => 'URL is required',        
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
				'comp_name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'comp_url' => 'required|url',
				'username' => 'required|string|max:255',
				'address' => 'required|string|max:255',
            	'email' => 'required|string|email|max:255|unique:users',
            	'password' => 'required|string|min:6',
            	'con_password' => 'required|string|min:6|same:password',
				'phone' => 'required|numeric|phone|digits:10',
			], $messages);	
		
			$c = new Company();
			
    		$c->comp_name = $request->comp_name;
    		$c->comp_url = $request->comp_url;	
			$c->save();
			
			//dd($request->role);
			$user = new User();
            $user->name = $request->comp_name;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->role_name = $request->role;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->company_id = $c->cid;
            $user->remember_token = $request->_token;
            $user->password = Hash::make($request->password);
        	$user->save();
		
		\LogActivity::addToLog('Company added successfully');	
		$request->session()->flash('alert-success', 'Company added successfully !!!');
		return redirect('/companies');
	}
	public function edit(Request $request)
	{
		//$company = DB::table('company')->join('users','company_id','=','cid')->get()->toArray();
		$company = Company::find($request->cid);
		$c_user = User::find($request->id);
		//dd($c_user);
		return view('Company.edit', compact('company','c_user'));
	}
	public function update(Request $request)
	{
		$messages = [
				'comp_name.required' => 'Company Name is required',        
				'comp_name.regex' => 'Company Name has invalid format',    
				'comp_url.required' => 'Company URL is required',        
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
				'comp_name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'comp_url' => 'required|url',
				'username' => 'required|string|max:255',
				'address' => 'required|string|max:255',
            	'email' => 'required|string|email|max:255',
				'phone' => 'required|numeric|phone|digits:10',
			], $messages);	
		
		$user = User::find($request->id);
		$company = Company::find($request->cid);

			$user->name = $request->comp_name;
    		$user->username = $request->username;
    		$user->address = $request->address;
    		$user->email = $request->email;
    		$user->phone = $request->phone;
    		$user->password = $user->password;
			$user->save();
			
			$company->comp_name = $request->comp_name;
			$company->comp_url = $request->comp_url;
			$company->save();
		
	\LogActivity::addToLog('Company updated successfully');	
	$request->session()->flash('alert-warning', 'Company updated successfully !!!');
	return redirect('/companies');
	}
	
	public function delete(Request $request)
	{
		$id = $request->get('id');
		
		$company = Company::find($id);
		$user = DB::table('users')->get()->toArray();
		
		foreach($user as $u)
		{
			if($u->company_id == $id)
			{
				$uid = User::find($u->id);
				//dd($uid);
				$uid->delete();
			}
		}
		$team = DB::table('team')->get()->toArray();
		foreach($team as $t)
		{
			if($t->company_id == $id)
			{
				$tid = Team::find($t->tid);
				//dd($tid);
				$tid->delete();
			}
		}
		$employee = DB::table('employee')->get()->toArray();
		foreach($employee as $emp)
		{
			if($emp->company_id == $id)
			{
				$emp_id = Employee::find($emp->emp_id);
				//dd($emp_id);
				$emp_id->delete();
			}
		}
		$company->delete();
		
		\LogActivity::addToLog('Company deleted successfully');	
		$request->session()->flash('alert-danger', 'Company deleted successfully !!!');
//   		return redirect('/companies');
		return response()->json(['deleted'=>$request->get('id')]);
	}
}
