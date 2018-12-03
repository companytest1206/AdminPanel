@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@include('includes.topbar')
<section>
   <!-- Left Sidebar -->
        @include('includes.leftsidebar')
   <!-- #END# Left Sidebar -->
	
   <!-- Right Sidebar -->
        @include('includes.rightsidebar')
   <!-- #END# Right Sidebar -->
</section>
<ol class="breadcrumb breadcrumb-col-blue pull-right">
    <li><a href="/home"><i class="material-icons">home</i> Home</a></li>
    <li><a href="/users"><i class="material-icons">person</i> Users</a></li>
    <li class="active"><i class="material-icons">person_add</i> New User</li>
</ol>
<section class="content">
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
							 <h2><strong>Add New User's Details here:</strong></h2>
	
						<!--
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('/companies') }}">Add New Company</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
-->

                        </div>
                        <div class="body">
                            <form action="{{ url('/users/new') }}" method="post">
  							@csrf
					  
                                <label for="comp_name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $errors->has('name') ? '' : old('name') }}" name="name" placeholder="Full Name">
                                    </div>
									 @if ($errors->has('comp_name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('comp_name') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="address">Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Address">{{ $errors->has('address') ? '' : old('address') }}</textarea>
                                    </div>
									 @if ($errors->has('address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('address') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="phone">Phone No.</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $errors->has('phone') ? '' : old('phone') }}" name="phone" placeholder="Phone Number">
                                    </div>
									 @if ($errors->has('phone'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('phone') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $errors->has('email') ? '' : old('email') }}" name="email" placeholder="Email Address">
                                    </div>
									 @if ($errors->has('email'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('email') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="username">Username</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $errors->has('username') ? '' : old('username') }}" name="username" placeholder="Username">
                                    </div>
									 @if ($errors->has('username'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('username') }}
     			 					</span>
     			 					@endif
                                </div>	
								
								<label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" id="password" style="display: inline-block; width: 900px">
										<span toggle="#password" class="fa fa-eye toggle-password" style="float: right; margin-top: 15px"></span>
                                    </div>
									 @if ($errors->has('password'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('password') }}
     			 					</span>
     			 					@endif
                                </div>	
								
								<label for="con_password">Retype Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control {{ $errors->has('con_password') ? ' is-invalid' : '' }}" name="con_password" placeholder="Retype Password" id="con_password" style="display: inline-block; width: 900px">
										<span toggle="#con_password" class="fa fa-eye toggle-password" style="float: right; margin-top: 15px"></span>
                                    </div>
									 @if ($errors->has('con_password'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('con_password') }}
     			 					</span>
     			 					@endif
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
								
                                <br>
                                <div class="row">
						<input type="submit" class="btn btn-primary" value="Add" style="width: 80px; margin-left: 20px;">
						<a class="btn btn-primary btn-close" href="{{ url('/users') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       					</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</section>