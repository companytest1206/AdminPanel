@extends('layouts.loginRegisterApp')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
@section('content')
<div class="login-box">

        <div class="logo">
            <a href="javascript:void(0);">Admin<b>Panel</b></a>
            <small>AdminPanel - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="{{ route('login') }}" method="POST">
					@csrf
                    <div class="msg"><strong>Sign in to start your session</strong></div>
					
					@if ($errors->has('username'))
        			  <span class="invalid-feedback" role="alert" style="color: red;">
        			   {{ $errors->first('username') }}
        			  </span>
     				@endif
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $errors->has('username') ? '' : old('username') }}" autofocus>
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
                        <div class="form-line" style="width: 250px">
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" id="password" style="display: inline-block">
                        </div>
						<span toggle="#password" class="fa fa-eye toggle-password" style="float: right; margin-top: 15px"></span>
                    </div>
					
					<script>
						$(".toggle-password").click(function() {

							$(this).toggleClass("fa-eye fa-eye-slash");
							var input = $($(this).attr("toggle"));
							if (input.attr("type") == "password") {
								input.attr("type", "text");
							} else {
								input.attr("type", "password");
							}
						});
					</script>
					
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink" {{ old('remember') ? 'checked' : '' }}>
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{ url('/register') }}">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection