@extends('layouts.loginRegisterApp')

@section('content')

<div class="signup-box">

        <div class="logo">
            <a href="javascript:void(0);">Admin<b>Panel</b></a>
            <small>AdminPanel - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="{{ route('password.request') }}" method="POST">
					{{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="msg"><strong>Reset Password</strong></div>
					
					@if ($errors->has('email'))
        			  <span class="invalid-feedback" role="alert" style="color: red;">
        			   {{ $errors->first('email') }}
        			  </span>
     				@endif
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                        </div>
                     </div>
					
					 @if ($errors->has('password'))
         		 	 <span class="invalid-feedback" role="alert" style="color: red;">
        		   		 {{ $errors->first('password') }}
         		 	 </span>
      				@endif
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" name="password" required data-toggle="password">
                        </div>
                    </div>
					
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required data-toggle="password">
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
                        </div>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
@endsection