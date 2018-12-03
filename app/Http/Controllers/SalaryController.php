<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Salary;
use Response;
use DB;
use App\Event;
use App\SuperSalary;
use Calendar;

class SalaryController extends Controller
{
//	public function details(Request $request) 
//	{
//		$name = $request->get('name');
//		$employees = DB::table('employee')->where('emp_name', $name)->join('designation','des_id','emp_designation')->join('company','cid','employee.company_id')->join('users','name','company.comp_name')->join('team','tid','employee.team_id')->select('designation','comp_name','team_name','address','emp_salary')->get()->toArray();
//		//dd($employees);
//        return Response::json($employees);
//	}
//    public function generate()
//	{
//		$employees = Employee::select('emp_id','emp_name')->get()->toArray();
//		return view('generateSalary', compact('employees'));
//	}
//	public function generate_salary_slip(Request $request)
//	{
//		$details = DB::table('emp_salary')->join('employee','emp_id','employee_id')->where('emp_name',$request->emp_name)->get()->toArray();
//		$data = $request;
//		return view('salarySlip', compact('data','details'));
//	}
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function getCalendar()
	{
		$details =  DB::table('calendar')->get()->toArray();
		$month_details =  DB::table('calendar')->select('sat_off','month')->get()->toArray();
		//dd($month_details[1]->month);
		$fest = array();
		foreach($details as $detail)
		{
			if(!empty($detail->sat_off)){
			 	$sat_offs[] = $detail->sat_off;
			}else{
				$sat_offs[] = '';
			}
			
			if(!empty($detail->fest_off))
			{
				if( strpos($detail->fest_off, ',') !== false ) {
					 $f = explode(',', $detail->fest_off);
					 array_push($fest, $f);
				 }	
				else{
					array_push($fest, $detail->fest_off);
				}
				
				$new_fests= array();
				for($i= 0; $i<count($fest); $i++)
				{
					//dd($fest);
					if(is_array($fest[$i]))
					{
						foreach($fest[$i] as $f)
						{
							array_push($new_fests, $f);
						}
					}
					else
					{
						array_push($new_fests, $fest[$i]);
					}
				}
			}
		}
		//dd($new_fests);
		
        return view('calendar', compact('sat_offs','new_fests','month_details'));
	}
	
	public function saveCalendarDetails(Request $request)
	{
        //dd($request);
		if($request->sat_off == null && $request->fest_off == null)
		{
			$request->session()->flash('alert-success', 'Null entry is not allowed!!!');
			return redirect('/calendar');
		}
		else
		{
			$c = new Event();
		
			$c->month = $request->month;	
			$c->total_days = $request->total_days;	
			$c->total_sundays = $request->total_sundays;	
			$c->sat_off = $request->sat_off;
			if($request->fest_off != '')
			{
				$fest_off = implode(' , ', $request->fest_off);
			}
			else
			{
				$fest_off = null;
			}
			$c->fest_off = $fest_off;
    		$c->work_days = $request->work_days;	
    		$c->mins_per_day = $request->mins_per_day;	
			$c->mins_month = $request->mins_month;	
			$c->save();
			\LogActivity::addToLog('Leave details stored successfully in calendar table');		
			$request->session()->flash('alert-success', 'Leave details stored successfully!!!');
			return redirect('/calendar');
		}
	}
	
	public function updateCalendarDetails(Request $request)
	{
		$e = Event::where('month',$request->month)->get()->toArray();
		$c = Event::find($e[0]['cid']);
		
    	$c->month = $request->month;	
    	$c->total_days = $request->total_days;	
    	$c->total_sundays = $request->total_sundays;	
		if($request->sat_off != '')
		{
			$sat_off = $request->sat_off;
		}
		else
		{
			$sat_off = '';
		}
    	$c->sat_off = $sat_off;
		if($request->fest_off != '')
		{
			//dd($request->fest_off);
			$fest_off = implode(' , ', $request->fest_off);
		}
		else
		{
			$fest_off = '';
		}
		$c->fest_off = $fest_off;
    	$c->work_days = $request->work_days;	
    	$c->mins_per_day = $request->mins_per_day;	
    	$c->mins_month = $request->mins_month;	
		$c->save();
		\LogActivity::addToLog('Leave details updated successfully in calendar table');		
		$request->session()->flash('alert-success', 'Leave details updated successfully!!!');
		return redirect('/calendar');
	}
	
	public function getSalView()
	{
		$employee = Employee::select('emp_id','name')->get()->toArray();
		$months = Event::select('month','cid')->get()->toArray();
		//dd($months);
		
		return view('salary', compact('employee','months'));
	}
	
	public function getMonthDetails(Request $request) 
	{
		$id = $request->get('id');
		$details = DB::table('calendar')->join('salary','salary.cid','calendar.cid')->select('work_days','mins_month','pay_sal','leave_DHM','adv_paid','sal_encash','tds_deduct','sal_id')->where('salary.cid',$id)->get()->toArray();
//		return Response::json($company->select(array('cid','comp_name'))->get());

           return Response::json($details);
	}
	
	public function getDetails(Request $request) 
	{
		$id = $request->get('id');
		$details = DB::table('calendar')->select('work_days','mins_month')->where('cid',$id)->get()->toArray();
//		return Response::json($company->select(array('cid','comp_name'))->get());

           return Response::json($details);
	}
	
	public function storeSalDetails(Request $request)
	{
		$messages = [
				'emp_name.required' => 'Employee Name is required',                 
				'month.required' => 'Month is required',                 
				'work_days.required' => 'Working Days are required',        
				'mins_month.required' => 'Hours are required',               
				'basic_sal.required' => 'Basic Salary is required',
				'net_sal.required' => 'Net Salary is required',
				'prof_tax.required' => 'Professional Tax is required',
				'pay_sal.required' => 'Payable Salary is required',
			];
		
		$request->validate([
				'emp_name' => 'required|not_in:0',
				'month' => 'required',
				'work_days' => 'required',
				'mins_month' => 'required',
				'basic_sal' => 'required',
				'net_sal' => 'required',
				'prof_tax' => 'required',
				'pay_sal' => 'required',
			], $messages);	
	
		//dd($request);
		$e = new Salary();
		
    	$e->emp_id = $request->emp_name;	
		$e->cid = $request->month;
    	$e->basic_sal = $request->basic_sal;	
    	$e->prof_tax = $request->prof_tax;	
    	$e->leave_DHM = $request->ldays.' days '.$request->lhours.' hours '.$request->lmins.' mins ';
    	$e->adv_paid = $request->adv_paid;	
    	$e->sal_encash = $request->sal_encash;	
    	$e->tds_deduct = $request->tds_deduct;	
    	$e->pay_sal = $request->pay_sal;	
		$e->save();
		\LogActivity::addToLog('Salary details stored successfully');		
		$request->session()->flash('alert-success', 'Salary details stored successfully!!!');
		return redirect('/salary');
	}
	
	public function editSalView()
	{
		$employee = Employee::select('emp_id','name')->get()->toArray();
		
		return view('editSalary', compact('employee'));
	}
	
	public function getEmpMonthDetails(Request $request) 
	{
		$id = $request->get('id');
		$emp = DB::table('employee')->join('salary','employee.emp_id','salary.emp_id')->join('calendar','calendar.cid','salary.cid')->where('salary.emp_id',$id)->select('salary','month','salary.cid')->get()->toArray();
//		return Response::json($company->select(array('cid','comp_name'))->get());

        return Response::json($emp);
	}
	
	public function editSalDetails(Request $request)
	{
		$messages = [
				'emp_name.required' => 'Employee Name is required',                 
				'month.required' => 'Month is required',                 
				'work_days.required' => 'Working Days are required',        
				'mins_month.required' => 'Hours are required',               
				'basic_sal.required' => 'Basic Salary is required',
				'net_sal.required' => 'Net Salary is required',
				'prof_tax.required' => 'Professional Tax is required',
				'pay_sal.required' => 'Payable Salary is required',
			];
		
		$request->validate([
				'emp_name' => 'required|not_in:0',
				'month' => 'required',
				'work_days' => 'required',
				'mins_month' => 'required',
				'basic_sal' => 'required',
				'net_sal' => 'required',
				'prof_tax' => 'required',
				'pay_sal' => 'required',
			], $messages);	
	
		//dd($request);
		$e = Salary::find($request->sal_id);
		//dd($e);
		
    	$e->emp_id = $request->emp_name;	
		$e->cid = $request->month;
    	$e->basic_sal = $request->basic_sal;	
    	$e->prof_tax = $request->prof_tax;	
    	$e->leave_DHM = $request->ldays.' days '.$request->lhours.' hours '.$request->lmins.' mins ';
    	$e->adv_paid = $request->adv_paid;	
    	$e->sal_encash = $request->sal_encash;	
    	$e->tds_deduct = $request->tds_deduct;	
    	$e->pay_sal = $request->pay_sal;	
		$e->save();
		\LogActivity::addToLog('Salary details updated successfully');		
		$request->session()->flash('alert-success', 'Salary details updated successfully!!!');
		return redirect('/edit_salary');
	}
	
	public function getSalary(Request $request) 
	{
		$id = $request->get('id');
		
		$emp = DB::table('employee')->where('emp_id',$id)->pluck('salary')->toArray();
		//dd($emp);
        return Response::json($emp);
	}
	
	public function getSuperCalView()
	{
		$employee = Employee::select('emp_id','name')->get()->toArray();
		$months = Event::select('month','cid')->get()->toArray();
		return view('superCalculation', compact('employee','months'));
	}
	
	public function storeSuperCalView(Request $request)
	{
		//dd($request);
		$messages = [
				'emp_name.required' => 'Employee Name is required',                 
				'month.required' => 'Month is required',                 
				'work_days.required' => 'Working Days are required',        
				'mins_month.required' => 'Hours are required',               
				'basic_sal.required' => 'Basic Salary is required',
				'pay_sal.required' => 'Payable Salary is required',
				'new_work_days.required' => 'New Working Days are required',        
				'new_mins_month.required' => 'New Working Hours are required',               
				'new_basic_sal.required' => 'New Basic Salary is required',
				'new_pay_sal.required' => 'New Payable Salary is required',
				'final_pay_sal.required' => 'Final Payable Salary is required',
			];
		
		$request->validate([
				'emp_name' => 'required|not_in:0',
				'month' => 'required',
				'work_days' => 'required',
				'mins_month' => 'required',
				'basic_sal' => 'required',
				'pay_sal' => 'required',
				'new_work_days' => 'required',
				'new_mins_month' => 'required',
				'new_basic_sal' => 'required',
				'new_pay_sal' => 'required',
				'final_pay_sal' => 'required',
			], $messages);	
	
		//dd($request);
		$s = new SuperSalary();
		
    	$s->emp_id = $request->emp_name;	
		$s->cid = $request->month;
		$s->work_days_before_change = $request->work_days.' days.';
		$s->mins_month_before_change = $request->mins_month;
    	$s->old_basic_salary = $request->basic_sal;	
		$s->before_change_leave_DHM = $request->ldays.' days '.$request->lhours.' hours '.$request->lmins.' mins ';
		$s->before_change_pay_sal = $request->pay_sal;
		$s->work_days_after_change = $request->new_work_days;
		$s->mins_month_after_change = $request->new_mins_month;
		$s->new_basic_salary = $request->new_basic_sal;
    	$s->profession_tax = $request->prof_tax;	
    	$s->after_change_leave_DHM = $request->nldays.' days '.$request->nlhours.' hours '.$request->nlmins.' mins ';
    	$s->adv_paid = $request->adv_paid;	
    	$s->sal_encash = $request->sal_encash;	
    	$s->tds_deduct = $request->tds_deduct;	
    	$s->after_change_pay_sal = $request->new_pay_sal;	
    	$s->final_pay_sal = $request->final_pay_sal;	
		$s->save();
		\LogActivity::addToLog('Super Salary details stored successfully');		
		$request->session()->flash('alert-success', 'Super Salary details stored successfully!!!');
		return redirect('/super_calculation');
	}
	
	public function getReport()
	{
		$employee = Employee::select('emp_id','name')->get()->sortBy('name');;
		$months = Event::select('month','cid')->get()->toArray();
		$sal_details = DB::table('salary')->join('calendar','calendar.cid','salary.cid')->join('employee','employee.emp_id','salary.emp_id')->where('month', date('F Y'))->get()->toArray();
		$super_sal_details = DB::table('super_cal_salary')->join('calendar','calendar.cid','super_cal_salary.cid')->join('employee','employee.emp_id','super_cal_salary.emp_id')->where('month', date('F Y'))->get()->toArray();
		//$sal_details = DB::table('salary')->join('calendar','calendar.cid','salary.cid')->join('employee','employee.emp_id','salary.emp_id')->where('salary.cid',$id)->where('salary.emp_id',$emp)->get()->toArray();
		//$super_sal_details = DB::table('super_cal_salary')->join('calendar','calendar.cid','super_cal_salary.cid')->join('employee','employee.emp_id','super_cal_salary.emp_id')->where('super_cal_salary.cid',2)->where('super_cal_salary.emp_id',7)->get()->toArray();
		//dd($super_sal_details);
		return view('report', compact('employee','months','sal_details','super_sal_details'));
	}
	
	public function getSalaryDetails(Request $request) 
	{
		$id = $request->get('id');
		$emp = $request->get('emp_id');
		$sal_details = DB::table('salary')->join('calendar','calendar.cid','salary.cid')->join('employee','employee.emp_id','salary.emp_id')->where('salary.cid',$id)->where('salary.emp_id',$emp)->get()->toArray();
		$super_sal_details = DB::table('super_cal_salary')->join('calendar','calendar.cid','super_cal_salary.cid')->join('employee','employee.emp_id','super_cal_salary.emp_id')->where('super_cal_salary.cid',$id)->where('super_cal_salary.emp_id',$emp)->get()->toArray();
//		return Response::json($company->select(array('cid','comp_name'))->get());
		if($sal_details == [])
		{
			return Response::json($super_sal_details);
		}
		if($super_sal_details == [])
		{
			return Response::json($sal_details);
		}
          
	}
}
