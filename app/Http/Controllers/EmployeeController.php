<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Address;
use App\Contact;
use Carbon\Carbon;
use Input;
use App\Employee;
use Response;
use File;
use App\Message;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Notification;
use Redirect;

class EmployeeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
		if(Auth::user()->role_name == 'Company')
		{
			$employees = DB::table('employee')->join('users','users.employee_id','=', 'employee.emp_id')->where('employee.company_id','=',Auth::user()->company_id)->join('designation', 'des_id','=','emp_designation')->join('company','cid','=','employee.company_id')->join('team', 'tid','=','employee.team_id')->paginate(5);
			//dd($employees);
			return view('Employee.employees', compact('employees'));
		}
		if(Auth::user()->role_name == 'Team')
		{
			$employees = DB::table('employee')->join('users','users.employee_id','=', 'employee.emp_id')->where('employee.team_id','=',Auth::user()->team_id)->join('designation', 'des_id','=','emp_designation')->join('company','cid','=','employee.company_id')->join('team', 'tid','=','employee.team_id')->paginate(5);
			//dd($employees);
			return view('Employee.employees', compact('employees'));
		}

		$employees = DB::table('employee')->join('contact_no', 'contact_no.cont_id','=','employee.cont_id')->join('emp_type', 'emp_type.emp_type_id','=','employee.emp_type_id')->join('address', 'address.id','=','employee.address_id')->get()->toArray();
		//dd($employees);
		//$employee = Employee::join('contact_no', 'contact_no.cont_id','=','employee.cont_id')->join('emp_type', 'emp_type.emp_type_id','=','employee.emp_type_id')->join('address', 'address.id','=','employee.address_id')->where('employee.emp_type_id','1')->where('employee.probation_end_date', Carbon::now())->get()->toArray();
		
		//$employee = Employee::where('employee.probation_end_date', Carbon::now()->format('Y-m-d'))->get()->toArray();
		
		//dd($employee);
//		$employee = Employee::get()->toArray();
//		
//			$now = Carbon::now()->toDateTimeString();
//			$msg = 'Your training period is completed';
//			if($employee->duration == strtotime($now))
//			{
//				view('reply', compact('msg', $msg));
//				
//				\Mail::send('reply', $email, function($message) use ($email)
//				{
//					$message->to($email['forward_to']);
//					$message->subject('Notification');
//					$message->from($email['from'], $email['sender_name']);
//				});
//			}
//			
//
//			{
//				$email = ['msg' => $msg, 'forward_to' => $forward_to, 'from' => Auth::user()->email, 'sender_name' => Auth::user()->name];
//				//dd($email);
//			
//				
//			}
//			
//			$m = new Message;
//			$m->from_user = Auth::user()->id;
//			$m->to_user = $user->id;
//			$m->message = $msg;
//			$m->save();
		
//			\LogActivity::addToLog('Admin forwarded the email to someone.');	
//			$request->session()->flash('alert-success', 'Admin forwarded the email successfully!!!');
//			return redirect('/showAllNotifications');
				
		
		return view('Employee.employees', compact('employees'));
	}
	
	public function detail(Request $request)
	{
		$employee = Employee::join('contact_no', 'contact_no.cont_id','=','employee.cont_id')->join('emp_type', 'emp_type.emp_type_id','=','employee.emp_type_id')->join('address', 'address.id','=','employee.address_id')->find($request->id);
		//dd($employee);
		return view('Employee.employee_detail', compact('employee'));
	}
	
	public function create()
	{
		if(Auth::user()->role_name == 'Company' || Auth::user()->role_name == 'Team')
		{
			$designation = DB::table('designation')->get()->toArray();
			$company = DB::table('company')->where('cid',Auth::user()->company_id)->get()->toArray();
			$teams = DB::table('team')->where('company_id',Auth::user()->company_id)->get()->toArray();
			//dd($company);						
			return view('Employee.create', compact('designation','company','teams'));
		}
		
		//$designation = DB::table('designation')->get()->toArray();
		$emp_type = DB::table('emp_type')->get()->toArray();
		$companies = DB::table('company')->get()->toArray();
		$teams = DB::table('team')->get()->toArray();
		$period = DB::table('period')->get()->toArray();
		$date = Carbon::now()->toDateString(); 
		$d = date("Y-m-d", strtotime("-18 years", strtotime($date))); 
		//dd($designation);						
		return view('Employee.create', compact('companies','teams','emp_type','period','d'));
	}
	public function teams(Request $request) 
	{
		$id = $request->get('id');
		$teams = DB::table('team')->select('tid','team_name')->where('company_id',$id)->get()->toArray();
//		return Response::json($company->select(array('cid','comp_name'))->get());

           return Response::json($teams);
	}
	
	public function store(Request $request)
	{
			//dd($request);
			$messages = [
				'fname.required' => 'First Name is required',        
				'fname.regex' => 'first Name has invalid format',         
				'lname.required' => 'Last Name is required',        
				'lname.regex' => 'Last Name has invalid format',
				'permanent_address.required' => 'Permanent Address is required',
				'emp_type.required' => 'Employee Type is required',
				'local_address.required' => 'Local Address is required',
				'emailId.required' => 'Email is required',
				'designation.required' => 'Designation is required',
				'bond_period.required' => 'Bond Period is required',
				'bond_end_date.required' => 'Bond End Date is required',
				'salary.required' => 'Salary is required',
				'dob.required' => 'Date of Birth is required',
				'joining_date.required' => 'Joining Date is required',
				'cont_no1.required' => 'At least one Contact No is required',
				'marital_status.required' => 'Marital Status is required',
				'permanent_address.required' => 'Permanent Address is required',
				'remarks.required' => 'Remarks are required',
			];
		
			$request->validate([
				'fname' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'lname' => 'required|max:255',
				'emp_type' => 'required|not_in:0',
				'designation' => 'required|not_in:0',
				'joining_date' => 'required', 
				'bond_period' => 'required', 
				'bond_end_date' => 'required',
				'salary' => 'required',
				'dob' => 'required',
				'cont_no1' => 'required|phone',
				'emailId' => 'required|string|email|max:255',
				'marital_status' => 'required',
				'permanent_address' => 'required',
				'remarks' => 'required',
			], $messages);	
			
			
			$joining_date= date('Y-m-d', strtotime($request->joining_date));
			//dd($request);	
			$probation_end_date= date('Y-m-d', strtotime($request->probation_end_date));
			$bond_end_date= date('Y-m-d', strtotime($request->bond_end_date));
			$confirmation_date= date('Y-m-d', strtotime($request->confirmation_date));
			$bdate= date('Y-m-d', strtotime($request->dob));
		
			$a = new Address();
			
    		$a->perm_address = $request->permanent_address;
    		$a->local_address = $request->local_address;
			$a->save();
		
			$c = new Contact();
				
    		$c->contact_no1 = $request->cont_no1;
			if($request->contact_no2 != null)
			{
				$c->cont_no2 = $request->contact_no2;
			}
			$c->save();
			
			$e = new Employee();
			
			if($request->training_period != null && $request->training_end_date != null)
			{
				$e->training_period = $request->training_period;
				$e->training_end_date = date_create(date('Y-m-d', strtotime($request->training_end_date)));
			}
    		$e->name = $request->fname.' '.$request->mname.' '.$request->lname;	
    		$e->emp_type_id = $request->emp_type;	
    		$e->designation = $request->designation;	
    		$e->joining_date = $joining_date;	
    		$e->bond_period = $request->bond_period;	
    		$e->probation_period = $request->probation_period;	
    		$e->probation_end_date = $probation_end_date;	
    		$e->bond_end_date = $bond_end_date;	
    		$e->salary = $request->salary;	
    		$e->confirmation_date = $confirmation_date;	
    		$e->DOB = $bdate;	
    		$e->emailId = $request->emailId;	
    		$e->marital_status = $request->marital_status;	
    		$e->family_members = $request->family_members;	
    		$e->remarks = $request->remarks;	
			if($request->file('image') != null)
			{
				$file = $request->file('image');
				$filename = $file->getClientOriginalName(); 
				$path = $file->storeAs('imgs', $filename);
		
				$file = $request->file('image');
				$filename = $file->getClientOriginalName(); 
				$path = $file->storeAs('public/imgs', $filename);
				$e->image = $filename;
			}
			else
			{
				$e->image = 'NULL';
			}
			$e->address_id = $a->id;
			$e->cont_id = $c->cont_id;
			$e->save();
		
	\LogActivity::addToLog('Employee added successfully');		
	$request->session()->flash('alert-success', 'Employee added successfully !!!');
	return redirect('/employees');
	}
	public function edit(Request $request)
	{
		if(Auth::user()->role_name == 'Company' || Auth::user()->role_name == 'Team')
		{
			$employee = Employee::find($request->emp_id);
			$user = User::find($request->id);
			$designation = DB::table('designation')->get()->toArray();
			$company = DB::table('company')->where('cid',Auth::user()->company_id)->get()->toArray();
			$teams = DB::table('team')->where('company_id',Auth::user()->company_id)->get()->toArray();
			//dd($teams);						
			return view('Employee.edit', compact('employee','user','designation','company','teams'));
		}
		if(Auth::user()->role_name == 'Admin')
		{	
			$employee = Employee::join('contact_no', 'contact_no.cont_id','=','employee.cont_id')->join('emp_type', 'emp_type.emp_type_id','=','employee.emp_type_id')->join('address', 'address.id','=','employee.address_id')->find($request->emp_id);
			$period = DB::table('period')->get()->toArray();
			$emp_type = DB::table('emp_type')->get()->toArray();
			$designation = DB::table('designation')->get()->toArray();
			//dd($employee);
			
			$joining_date= date('l j F Y', strtotime($employee->joining_date));
			if($employee->training_end_date != null)
			{
				$training_end_date= date('l j F Y', strtotime($employee->training_end_date));
			}
			$probation_end_date= date('l j F Y', strtotime($employee->probation_end_date));
			$bond_end_date= date('l j F Y', strtotime($employee->bond_end_date));
			$confirmation_date= date('l j F Y', strtotime($employee->confirmation_date));
			$bdate= date('l j F Y', strtotime($employee->DOB));
			
		return view('Employee.edit', compact('employee','period','emp_type','designation','joining_date'));
		}
	}
	public function update(Request $request)
	{
		//dd($request);
		$messages = [
				'fname.required' => 'First Name is required',        
				'fname.regex' => 'first Name has invalid format',         
				'lname.required' => 'Last Name is required',        
				'lname.regex' => 'Last Name has invalid format',
				'permanent_address.required' => 'Permanent Address is required',
				'emp_type.required' => 'Employee Type is required',
				'local_address.required' => 'Local Address is required',
				'emailId.required' => 'Email is required',
				'designation.required' => 'Designation is required',
				'bond_period.required' => 'Bond Period is required',
				'bond_end_date.required' => 'Bond End Date is required',
				'salary.required' => 'Salary is required',
				'dob.required' => 'Date of Birth is required',
				'joining_date.required' => 'Joining Date is required',
				'cont_no1.required' => 'At least one Contact No is required',
				'marital_status.required' => 'Marital Status is required',
				'permanent_address.required' => 'Permanent Address is required',
				'remarks.required' => 'Remarks are required',
			];
		
			$request->validate([
				'fname' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'lname' => 'required|max:255',
				'emp_type' => 'required|not_in:0',
				'designation' => 'required|not_in:0',
				'joining_date' => 'required', 
				'bond_period' => 'required', 
				'bond_end_date' => 'required',
				'salary' => 'required',
				'dob' => 'required',
				'cont_no1' => 'required|phone',
				'emailId' => 'required|string|email|max:255',
				'marital_status' => 'required',
				'permanent_address' => 'required',
				'remarks' => 'required',
			], $messages);
		
			$e = Employee::join('contact_no', 'contact_no.cont_id','=','employee.cont_id')->join('emp_type', 'emp_type.emp_type_id','=','employee.emp_type_id')->join('address', 'address.id','=','employee.address_id')->find($request->emp_id);
			//dd($request);
			if($request->image != null)
			{
				$usersImage = public_path("storage/imgs/{$e->image}"); // get previous image from folder
				if (File::exists($usersImage)) { // unlink or remove previous image from folder
					unlink($usersImage);
				}
        		$file = $request->file('image');
				$filename = $file->getClientOriginalName(); 
				$path = $file->storeAs('public/imgs', $filename);
				$e->image = $filename;
				
				$file = $request->file('image');
				$filename = $file->getClientOriginalName(); 
				$path = $file->storeAs('imgs', $filename);
			}
		
//			$joining_date= date('Y-m-d', strtotime($request->joining_date));
//			$probation_end_date= date('Y-m-d', strtotime($request->probation_end_date));
//			$bond_end_date= date('Y-m-d', strtotime($request->bond_end_date));
//			$confirmation_date= date('Y-m-d', strtotime($request->confirmation_date));
			$bdate= date('Y-m-d', strtotime($request->dob));
		
			$a = Address::find($e->address_id);
    		$a->perm_address = $request->permanent_address;
    		$a->local_address = $request->local_address;
			$a->save();
			
			$c = Contact::find($e->cont_id);
    		$c->contact_no1 = $request->cont_no1;
			$c->contact_no2 = $request->cont_no2;
			$c->save();
			
			if($request->emp_type == '1')
			{
				$e->training_period = 'NULL';
				$e->training_end_date = 'NULL';
				
			}
			if($request->emp_type == '2' || $request->emp_type == '3')
			{
				$e->training_period = $e->training_period;
				$e->training_end_date = $e->training_end_date;
			}
		
    		$e->name = $request->fname.' '.$request->mname.' '.$request->lname;		
    		$e->emp_type_id = $request->emp_type;	
    		$e->designation = $request->designation;	
    		$e->joining_date = $request->joining_date;	
    		$e->bond_period = $request->bond_period;	
    		$e->probation_period = $request->probation_period;	
    		$e->probation_end_date = $request->probation_end_date;	
    		$e->bond_end_date = $request->bond_end_date;	
    		$e->salary = $request->salary;	
    		$e->confirmation_date = $request->confirmation_date;	
    		$e->DOB = $bdate;	
    		$e->emailId = $request->emailId;	
    		$e->marital_status = $request->marital_status;	
    		$e->family_members = $request->family_members;	
    		$e->remarks = $request->remarks;	
			$e->address_id = $a->id;
			$e->cont_id = $c->cont_id;
			$e->save();
		
	\LogActivity::addToLog('Employee updated successfully');		
	$request->session()->flash('alert-warning', 'Employee updated successfully !!!');
	return redirect('/employees');
	}
	
	public function delete(Request $request)
	{
		//$id = $request->get('id');
		$id = $request->emp_id;
		//dd($id);
		$employee = Employee::find($id);
		
		$usersImage = public_path("storage/imgs/{$employee->image}"); // get previous image from folder
		if (File::exists($usersImage)) { // unlink or remove previous image from folder
			unlink($usersImage);
		}
		
		//dd($employee->cont_id);
		$contact = Contact::find($employee->cont_id);
		$contact->delete();
		
		$address = Address::find($employee->address_id);
		$address->delete();
		
		$employee->delete();
		
		\LogActivity::addToLog('Employee deleted successfully');	
		$request->session()->flash('alert-danger', 'Employee deleted successfully !!!');
   		//return response()->json(['success'=> 'Employee has been deleted successfully.!']);
   		return redirect('/employees');
	}
	
	public function getCV()
	{
		return view('Employee.createCV');
	}
	
	public function uploadDocument(Request $request)
	{
		$messages = [
				'name.required' => 'Employee Name is required',        
				'name.regex' => 'Employee Name has invalid format',    
				'email.required' => 'Email is required',			
			];
		
		$request->validate([
			'name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
			'email' => 'required|string|email|max:255',
			'document' => 'required|mimes:pdf'
		], $messages);
		
		$name = $request->name;
		$email = $request->email;
		$document = $request->file('document');
		$to_email = 'companytest1206@gmail.com';
	
		$filename = $document->getClientOriginalName(); 
		//dd(storage_path().'\apps'.'\pdfs');
		$path = $document->storeAs('pdfs',$filename);
		
		$data = [
			'name' => $name,
			'email' => $email,
			'to_email' => $to_email,
			'document' => $document
		];
		
		if ($document->getError() == 1) {
			$max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
			$error = 'The document size must be less than ' . $max_size . 'Mb.';
			$request->session()->flash('alert-danger', $error);
			return redirect()->back();
		}
		
		\Mail::to($to_email)->send(new \App\Upload($data), function ($m) use($data){
			$m->from($data['email'], $data['name']);
			$m->subject('CV uploaded!');
		});
		
		$sender = User::find($request->id);
		$receiver = User::find(1);
		//dd($receiver);
		
		$message = new Message;
		$message->setAttribute('from_user', $sender->id);
        $message->setAttribute('to_user', $receiver->id);
        $message->setAttribute('read_at', Carbon::now()->toDateTimeString());
        $message->setAttribute('message', $sender->name.' sended his/her CV to you'.'('.$receiver->name.')');
        $message->save();
         
         //send notification using the "user" model, when the user receives new message
		$when = Carbon::now()->addMinutes(10);
        $receiver->notify(new NewMessage($sender));
		
		//send notification using the "Notification" facade
        Notification::send($receiver, new NewMessage($sender));
//
//		\Mail::send('Employee.uploaded', $data , function ($m) use($data, $document){
//			$m->sender($data['email'], $data['name']);
//			$m->subject('CV sended!');
//			$m->to($data['to_email']);
//			$m->attach($document->getRealPath(), 
//					[
//						'as' => $document->getClientOriginalName(), 
//    					'mime' => $document->getMimeType()
//					]);
//		});
//		\LogActivity::addToLog('Employee uploaded his/her CV & sended to admin successfully');
		$data=[];
		$request->session()->flash('alert-success', 'CV uploaded and sended to admin successfully !!!');
		return redirect('/home');
		//return createNotification($data);
	}
	
	
}
