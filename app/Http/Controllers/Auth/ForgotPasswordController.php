<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Auth;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
	
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		if(Auth::check())
		{
			$this->middleware('auth',['only'=>['showLinkRequestFormForOthers'],'only'=>['showLinkRequestForm']]);
		}
		else
		{
			$this->middleware('guest',['only'=>['showLinkRequestForm'],'only'=>['showLinkRequestFormForOthers']]);
		}
        
    }
}
