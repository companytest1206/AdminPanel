@extends('layouts.loginRegisterApp')

@section('content')
<div class="signup-box">

        <div class="logo">
            <a href="javascript:void(0);">Admin<b>Panel</b></a>
            <small>AdminPanel - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
				
                <form id="sign_in" action="{{ route('password.email') }}" method="POST">
					@csrf
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
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $errors->has('email') ? '' : old('email') }}" autofocus>
                        </div>
                     </div>
					
                    <div class="row">
                        <div class="col-xs-4">
                           <button type="submit" class="btn btn-block bg-pink waves-effect" style="width: 200px; margin-left: 50px">Send Password Reset Link</button>
                        </div>
                    </div>
               
                </form>
            </div>
        </div>
    </div>
@endsection