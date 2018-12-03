@extends('layouts.app')
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
    <li class="active"><i class="material-icons">edit</i> Edit User</li>
</ol>
<section class="content">
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
							<h2><strong>Update User Details here:</strong></h2>							
						
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
                            <form action="/users/edit/{{$user->id}}" method="post">
  							@csrf
					  
                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $errors->has('name') ? '' : $user->name}}" name="name" placeholder="Full name">
                                    </div>
									 @if ($errors->has('name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('name') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="address">Address</label>
                                <div class="form-group">
									<div class="form-line">
                                    	<textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Address">{{ $errors->has('address') ? '' : $user->address }}</textarea>
									 	@if ($errors->has('address'))
    									<span class="invalid-feedback" role="alert" style="color: red;">
      				  						{{ $errors->first('address') }}
     			 						</span>
     			 						@endif
									</div>
								</div>
								
								<label for="phone">Phone No.</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"  value="{{ $errors->has('phone') ? '' : $user->phone}}" name="phone" placeholder="Phone Number">
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
                                       <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $errors->has('email') ? '' : $user->email}}" name="email" placeholder="Email">
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
                                        <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}"  value="{{ $errors->has('username') ? '' : $user->username}}" name="username" placeholder="Username">
                                    </div>
									 @if ($errors->has('username'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('username') }}
     			 					</span>
     			 					@endif
                                </div>	
								
								<label>If you want to change password <a href="{{ route('password.request') }}">visit here</a></label>
								
                                <br>
                                <div class="row">
						<input type="submit" class="btn btn-primary" value="Update" style="width: 80px; margin-left: 20px;">
						<a class="btn btn-primary btn-close" href="{{ url('/users') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       					</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</section>