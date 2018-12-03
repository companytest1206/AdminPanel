@extends('layouts.loginRegisterApp')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
@section('content')
<div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>Panel</b></a>
            <small>AdminPanel - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" action="{{ route('register') }}" method="POST">
					@csrf
                    <div class="msg"><strong>Register here for a new account</strong></div>
					
					@if ($errors->has('name'))
     	 			<span class="invalid-feedback" role="alert" style="color: red;">
      		  			{{ $errors->first('name') }}
     		 		</span>
      				@endif
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Full name" value="{{ $errors->has('name') ? '' : old('name')}}" autofocus>
                        </div>
                    </div>
					
					@if ($errors->has('address'))
      				<span class="invalid-feedback" role="alert" style="color: red;">
        				{{ $errors->first('address') }}
      				</span>
      				@endif
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">home</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control  {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Address" value="{{ $errors->has('address') ? '' : old('address')}}">
                        </div>
                    </div>
					
					@if ($errors->has('phone'))
      				<span class="invalid-feedback" role="alert" style="color: red;">
        				{{ $errors->first('phone') }}
      				</span>
      				@endif
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Phone Number" value="{{ $errors->has('phone') ? '' : old('phone') }}">
                        </div>
                    </div>
					
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
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ $errors->has('email') ? '' : old('email') }}">
                        </div>
                    </div>
					
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
                            <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Username" value="{{ $errors->has('username') ? '' : old('username') }}">
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
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" style="display: inline-block" id="password">
                        </div>
						<span toggle="#password" class="fa fa-eye toggle-password" style="float: right; margin-top: 15px"></span>
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
                           <input type="password" class="form-control {{ $errors->has('con_password') ? ' is-invalid' : '' }}" name="con_password" placeholder="Retype password" style="display: inline-block" id="con_password">
                        </div>
						<span toggle="#con_password" class="fa fa-eye toggle-password" style="float: right; margin-top: 15px"></span>
                    </div>
					
					@if ($errors->has('con_password'))
        			<span class="invalid-feedback" role="alert" style="color: red;">
          				{{ $errors->first('con_password') }}
        			</span>
      				@endif
<!--
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>
-->
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

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ url('/login') }}">You already have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection