<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use App\Draft;
use Auth;
use DB;
use Carbon\Carbon;
use App\Notifications\ReplyBacktoSender;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
//	public function index(Request $request) 
//	{
//		$name = User::find(1);
//		//dd($name->name);
//		$message = new Message;
//		$message->setAttribute('from_user', Auth::user()->id);
//        $message->setAttribute('to_user', 1);
//        $message->setAttribute('read_at', Carbon::now()->toDateTimeString());
//        $message->setAttribute('message', Auth::user()->name.' sended his/her CV to you'.'('.$name->name.')');
//        $message->save();
//         
//		$fromUser = User::find(Auth::user()->id);
//        $toUser = User::find(1);
//         
//        // send notification using the "user" model, when the user receives new message
//		//$when = Carbon::now()->addMinutes(10);
//        $toUser->notify(new NewMessage($fromUser));
//         
//        // send notification using the "Notification" facade
//        Notification::send($toUser, new NewMessage($fromUser));
//		return redirect()->back();
//	}
	
	public function notificationMarked(Request $request){
		//dd($user);
        $notification = Message::find($request->id);
		//dd($notification);
        $notification->read_at = Carbon::now()->toDateTimeString();
        $notification->save();
        return back();
 	}
	
//	public function getNotification()
//	{
//        $read = DB::table('messages')->pluck('read_at')->toArray();
//		$users = DB::table('messages')->join('users','users.id','messages.from_user')->join('employee','users.employee_id','employee.emp_id')->select('name','emp_image','messages.created_at','messages.message', 'messages.id','messages.read_at')->where('messages.created_at','=',$read[0])->get()->toArray(); 
//		$count = count($users);
//		return response()->json(compact('users','count'));
// 	}
	
	public function changeReadAt()
	{
		$msg = Message::whereRaw('messages.created_at = messages.read_at')->get()->toArray();
		$msg->read_at = Carbon::now()->toDateTimeString();
		$msg->save();

		dd($msg);
        return back();
  
 	}
	
	public function showNotificationsView()
	{
		$msgs = DB::table('messages')->join('users','users.id','messages.from_user')->join('employee','users.employee_id','employee.emp_id')->select('messages.id','name','message','messages.created_at','messages.read_at')->get()->toArray(); 
		//dd($msgs);
		foreach($msgs as $msg)
		{
			$currentTime = date('Y-m-d H:i:s');
			$toTime = strtotime($currentTime);
   			$fromTime = strtotime($msg->created_at);
 			$timeDiff = floor(abs($toTime - $fromTime) / 60);
			
			if ($timeDiff < 2) {
				$timeDiff = "Just now";
			} elseif ($timeDiff > 2 && $timeDiff < 60) {
				$timeDiff = floor(abs($timeDiff)) . " minutes ago";
			} elseif ($timeDiff > 60 && $timeDiff < 120) {
				$timeDiff = floor(abs($timeDiff / 60)) . " hour ago";
   			} elseif ($timeDiff < 1440) {
				$timeDiff = floor(abs($timeDiff / 60)) . " hours ago";
			} elseif ($timeDiff > 1440 && $timeDiff < 2880) {
				$timeDiff = floor(abs($timeDiff / 1440)) . " day ago";
  			} elseif ($timeDiff > 2880) {
				$timeDiff = floor(abs($timeDiff / 1440)) . " days ago";
			}
			$ctime[] = $timeDiff;
		}
		
		foreach($msgs as $msg)
		{
			$currentTime = date('Y-m-d H:i:s');
			$toTime = strtotime($currentTime);
   			$fromTime = strtotime($msg->read_at);
 			$timeDiff = floor(abs($toTime - $fromTime) / 60);

			if ($timeDiff < 2) {
				$timeDiff = "Just now";
			} elseif ($timeDiff > 2 && $timeDiff < 60) {
				$timeDiff = floor(abs($timeDiff)) . " minutes ago";
			} elseif ($timeDiff > 60 && $timeDiff < 120) {
				$timeDiff = floor(abs($timeDiff / 60)) . " hour ago";
   			} elseif ($timeDiff < 1440) {
				$timeDiff = floor(abs($timeDiff / 60)) . " hours ago";
			} elseif ($timeDiff > 1440 && $timeDiff < 2880) {
				$timeDiff = floor(abs($timeDiff / 1440)) . " day ago";
  			} elseif ($timeDiff > 2880) {
				$timeDiff = floor(abs($timeDiff / 1440)) . " days ago";
			}
			$rtime[] = $timeDiff;
		}
		//dd($rtime);
		$count = count($msgs);
        return view('Notification.notification', compact('count','msgs','ctime','rtime'));
 	}
	
	public function singleNotification(Request $request)
	{
		$notification = Message::find($request->id);
		$notification->read_at = Carbon::now()->toDateTimeString();
        $notification->save();
        
		$msg = Message::join('users','users.id','messages.from_user')->select('messages.id','email','name','message','messages.created_at','read_at')->find($request->id); 
		$msgs = DB::table('messages')->join('users','users.id','messages.from_user')->join('employee','users.employee_id','employee.emp_id')->select('messages.id','name','message','messages.created_at', 'read_at')->get()->toArray(); 
		//dd($msg);
		//$count = count($msgs);
		//dd($msg->email);
			$currentTime = date('Y-m-d H:i:s');
			$toTime = strtotime($currentTime);
   			$fromTime = strtotime($msg->created_at);
 			$timeDiff = floor(abs($toTime - $fromTime) / 60);
			
			if ($timeDiff < 2) {
				$timeDiff = "Just now";
			} elseif ($timeDiff > 2 && $timeDiff < 60) {
				$timeDiff = floor(abs($timeDiff)) . " minutes ago";
			} elseif ($timeDiff > 60 && $timeDiff < 120) {
				$timeDiff = floor(abs($timeDiff / 60)) . " hour ago";
   			} elseif ($timeDiff < 1440) {
				$timeDiff = floor(abs($timeDiff / 60)) . " hours ago";
			} elseif ($timeDiff > 1440 && $timeDiff < 2880) {
				$timeDiff = floor(abs($timeDiff / 1440)) . " day ago";
  			} elseif ($timeDiff > 2880) {
				$timeDiff = floor(abs($timeDiff / 1440)) . " days ago";
			}
		
		//dd($timeDiff);
		
        return view('Notification.singleNotification', compact('msg','count','timeDiff'));
 	}
	
	public function deleteNotification(Request $request)
	{
		$msg = Message::find($request->get('id'));
		//dd($msg);
		$msg->delete();
		
		\LogActivity::addToLog('Notification mail deleted successfully');	
		$request->session()->flash('alert-danger', 'Admin deleted one of its notification mail successfully !!!');
        return response()->json(['success'=> 'Notification Mail has been deleted successfully.!']);
 	}
	
	public function deleteAllNotifications(Request $request)
	{
		$ids = $request->get('check');
		
//		foreach($ids as $id)
//		{
			$msg = Message::find($ids);
			$msg->delete();
//		}
		//Message::whereIn('id',explode(",",$ids))->delete();
		
		\LogActivity::addToLog('Notification mails deleted successfully');	
		$request->session()->flash('alert-danger', 'Admin deleted his/her notification mails successfully!!!');
        return response()->json(['success'=>'The Notification Mails are deleted successfully.!']);
		//['success'=>'The Notification Mails are deleted successfully.!']
 	}
	
	public function unreadNotification(Request $request)
	{
		$msg = Message::find($request->id); 
		$msg->read_at = $msg->created_at;
		$msg->save();
		
        return redirect('/showAllNotifications');
 	}
	
	public function refresh()
	{
        return redirect()->back();
 	}
	
	public function replyEmailNotification(Request $request)
	{
		//dd($request);
		if($request->flag == 'draft')
		{
			if($request->get('f_attachment') != '') $a = $request->get('f_attachment'); else $a = 'null';
			$draft = new Draft();
			$draft->reply_message = strip_tags($request->get('forward_msg'));
			$draft->details = $request->get('details');
			$draft->attachment = $a;
			$draft->msg_id = $request->get('msg_id');
			$draft->forward_to = $request->get('forward_to');
			$draft->save();  
			return response()->json(['success'=>'Message saved as drafts successfully.!']);
		}
		
		if($request->flag == 'reply')
		{
			$user= Message::join('users','messages.from_user','users.id')->find($request->id);
	
			$msg = $request->reply;
			$strip_msg = strip_tags($msg);
			$final_msg = str_replace("&nbsp;", "", $strip_msg);
			$attachment = $request->file('attachment');
			$to = $request->to_mail;
			//dd($to);
			$from = $request->from_mail;
			$from_name = $request->from_name;
			$to_name = $request->to_name;
			view('reply', compact('msg', $msg));
			//dd($msg);
			if($attachment != null)
			{
				$email = ['attachment' => $attachment, 'msg' => $final_msg, 'from' => $from, 'from_name' => $from_name, 'to' => $to];
			//dd($email);
		
				\Mail::send('reply', $email, function($message) use ($email)
				{
					$message->to($email['to']);
					$message->subject('Notify back!');
					$message->from($email['from'], $email['from_name']);
					$message->attach($email['attachment']->getRealPath(), array(
        				'as' => 'examplePDF.' . $email['attachment']->getClientOriginalExtension(), 
        				'mime' => $email['attachment']->getMimeType())
					);
				});
			}
			else
			{
				$email = ['msg' => $final_msg, 'from' => $from, 'from_name' => $from_name, 'to' => $to];
				//dd($email);
		
				\Mail::send('reply', $email, function($message) use ($email)
				{
					$message->to($email['to']);
					$message->subject('Notify back!');
					$message->from($email['from'], $email['from_name']);
				});
			}
			
			$m = new Message;
			$m->from_user = Auth::user()->id;
			$m->to_user = $user->id;
			$m->read_at = Carbon::now()->toDateTimeString();
			$m->message = 'Admin '.Auth::user()->name. ' replied back to '.$user->name;
			$m->save();
			
			$sender = User::find($user->to_user);
			$receiver = User::find($user->from_user);

			//send notification using the "user" model, when the user receives new message
			//$when = Carbon::now()->addMinutes(10);
			//$receiver->notify(new ReplyBackToSender($sender,$email));
		
			//send notification using the "Notification" facade
			//Notification::send($receiver, new ReplyBackToSender($sender,$email));
		
			\LogActivity::addToLog('Admin replied back on mail notification of employee.');	
			$request->session()->flash('alert-success', 'Admin replies back on mail notification of employee successfully!!!');
			return redirect('/showAllNotifications');
		}
		
 	}
	
	public function forwardThisMail(Request $request)
	{
		if($request->flag == 'draft')
		{
			if($request->get('f_attachment') != null) $a = $request->get('f_attachment'); else $a = 'null';
			$draft = new Draft();
			$draft->reply_message = strip_tags($request->get('forward_msg'));
			$draft->details = strip_tags($request->get('details'));
			$draft->attachment = $a;
			$draft->msg_id = $request->get('msg_id');
			$draft->forward_to = $request->get('forward_to');
			$draft->save();  
			return response()->json(['success'=>'Message saved as drafts successfully.!']);
		}
		
		if($request->flag == 'forward')
		{
			$user= Message::join('users','messages.from_user','users.id')->find($request->id);
			//dd(strip_tags(preg_replace('/(\v|\s)+/', ' ', $request->forward_msg)));
			$forward_to = $request->forward_to;
			$attachment = $request->f_attachment;
			$fmsg = $request->forward_msg;
			$detail = $request->details;
			//$strip = strip_tags($fmsg);
			$message = str_replace(array("\t", "\r"), '', $fmsg);
			$details = str_replace(array("\t", "\r"), '', $detail);
			$msg = nl2br($detail."\r\n".$fmsg, false);
			//dd($msg);
			view('reply', compact('msg', $msg));
			
			if($attachment != null)
			{
				$email = ['attachment' => $attachment, 'msg' => $msg, 'forward_to' => $forward_to, 'from' => Auth::user()->email, 'sender_name' => $sender_name= Auth::user()->name];
				//dd($email);
			
				\Mail::send('reply', $email, function($message) use ($email)
				{
					$message->to($email['forward_to']);
					$message->subject('Fwd: Notifying back!');
					$message->from($email['from'], $email['sender_name']);
					$message->attach($email['attachment']->getRealPath(), array(
        				'as' => 'examplePDF.' . $email['attachment']->getClientOriginalExtension(), 
        				'mime' => $email['attachment']->getMimeType())
					);
				});
			}
			else
			{
				$email = ['msg' => $msg, 'forward_to' => $forward_to, 'from' => Auth::user()->email, 'sender_name' => Auth::user()->name];
				//dd($email);
			
				\Mail::send('reply', $email, function($message) use ($email)
				{
					$message->to($email['forward_to']);
					$message->subject('Fwd: Notifying back!');
					$message->from($email['from'], $email['sender_name']);
				});
			}
			
			$m = new Message;
			$m->from_user = Auth::user()->id;
			$m->to_user = $user->id;
			$m->message = $msg;
			$m->save();
		
			//send notification using the "user" model, when the user receives new message
			//$receiver->notify(new ReplyBackToSender($sender,$email));
		
			//send notification using the "Notification" facade
			//Notification::send($receiver, new ReplyBackToSender($sender,$email));
		
			\LogActivity::addToLog('Admin forwarded the email to someone.');	
			$request->session()->flash('alert-success', 'Admin forwarded the email successfully!!!');
			return redirect('/showAllNotifications');
		}
				
 	}
	
	public function sendEmployeeNotification(Request $request)
	{
			//$user= Message::join('users','messages.from_user','users.id')->find($request->id);
			$employee = Employee::get()->toArray();
			$now = Carbon::now()->toDateTimeString();
			$msg = 'Your training period is completed';
			if($employee->duration == strtotime($now))
			{
				view('reply', compact('msg', $msg));
				
				\Mail::send('reply', $email, function($message) use ($email)
				{
					$message->to($email['forward_to']);
					$message->subject('Notification');
					$message->from($email['from'], $email['sender_name']);
				});
			}
			

			{
				$email = ['msg' => $msg, 'forward_to' => $forward_to, 'from' => Auth::user()->email, 'sender_name' => Auth::user()->name];
				//dd($email);
			
				
			}
			
			$m = new Message;
			$m->from_user = Auth::user()->id;
			$m->to_user = $user->id;
			$m->message = $msg;
			$m->save();
		
			\LogActivity::addToLog('Admin forwarded the email to someone.');	
			$request->session()->flash('alert-success', 'Admin forwarded the email successfully!!!');
			return redirect('/showAllNotifications');
				
 	}
	
}
