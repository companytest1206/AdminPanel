<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
	{
		$customers = DB::table('customer')->paginate(5);
		//dd($customers[0]->created_at);
		return view('Customer.customers', compact('customers'));
	}
	public function create()
	{						
		return view('Customer.create');
	}
	
	public function store(Request $request)
	{
			$messages = [
				'name.required' => 'Employee Name is required',        
				'name.regex' => 'Employee Name has invalid format',    
				'address.required' => 'Employee Address is required',
				'email.required' => 'Employee Email is required',
//				'email.email' => 'Email should have a valid email address',
//				'email.unique' => 'Email should have unique email address',
				'phone.required' => 'Employee Phone Number is required',
				'phone.integer' => 'Enter correct Phone Number',
				'phone.digits' => 'Enter correct Phone Number',	
				
			];
		
			$request->validate([
				'name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'address' => 'required|string|max:255',
            	'email' => 'required|string|email|max:255',
				'phone' => 'required|numeric|phone|digits:10',
			], $messages);	
		
			$c = new Customer();
			
    		$c->name = $request->name;
    		$c->address = $request->address;	
    		$c->phone = $request->phone;	
    		$c->email = $request->email;	
			$c->save();
		
	\LogActivity::addToLog('Admin added customer successfully');		
	$request->session()->flash('alert-success', 'Admin added customer successfully !!!');
	return redirect('/customers');
	}
	public function edit(Request $request)
	{	
		$customer = Customer::find($request->cust_id);
		//dd($customer->name);
		return view('Customer.edit', compact('customer'));
	}
	public function update(Request $request)
	{
		$messages = [
				'name.required' => 'Employee Name is required',        
				'name.regex' => 'Employee Name has invalid format',    
				'address.required' => 'Address is required',
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
            	'email' => 'required|string|email|max:255',
				'phone' => 'required|numeric|phone|digits:10',
			], $messages);	
		
			$customer = Customer::find($request->cust_id);
//			/dd($customer);
			$customer->name = $request->name;
    		$customer->address = $request->address;
    		$customer->email = $request->email;
    		$customer->phone = $request->phone;
			$customer->save();
		
	\LogActivity::addToLog('Admin updated customer successfully');		
	$request->session()->flash('alert-warning', 'Admin updated customer successfully !!!');
	return redirect('/customers');
	}
	
	public function delete(Request $request)
	{
		$id = $request->get('id');
		$customer = Customer::find($id);
		$customer->delete();
		
		\LogActivity::addToLog('Admin deleted customer successfully');	
		$request->session()->flash('alert-danger', 'Admin deleted customer successfully !!!');
   		return response()->json(['success'=> 'Customer has been deleted successfully.!']);
	}
	
}
