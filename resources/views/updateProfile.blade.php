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
    <li class="active"><i class="material-icons">edit</i> Edit Profile</li>
</ol>
	@if(Auth::user()->role_name == 'Admin')
	<section class="content">
	    <!-- Main content -->
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                <strong>Update Your Profile Here.</strong>
                            </h2>
						<!--
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
-->
                        </div>
                        <div class="body">
                            <form action="/update/profile/{{Auth::user()->id}}/{{Auth::user()->team_id}}/{{Auth::user()->company_id}}/{{Auth::user()->employee_id}}" method="post">
  							 @csrf
                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $errors->has('name') ? '' : Auth::user()->name }}" name="name" placeholder="Full Name">
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
                                        <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Address">{{ $errors->has('address') ? '' : Auth::user()->address }}</textarea>
                                    </div>
									 @if ($errors->has('address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('address') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="phone">Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $errors->has('phone') ? '' : Auth::user()->phone }}" name="phone" placeholder="Phone Number">
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
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $errors->has('email') ? '' : Auth::user()->email }}" name="email" placeholder="Email Address">
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
                                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $errors->has('username') ? '' : Auth::user()->username }}" name="username" placeholder="Username">
                                    </div>
									 @if ($errors->has('username'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('username') }}
     			 					</span>
     			 					@endif
                                </div>	
								
								<label>If you want to change password <a href="{{route('password.request')}}">visit here</a></label>
								
                                <br>
                                <div class="row">
						<input type="submit" class="btn btn-primary" value="Update" style="width: 80px; margin-left: 20px;">
						<a class="btn btn-primary btn-close" href="{{ url('/profile') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       					</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  

    </section>
	@elseif(Auth::user()->role_name == 'Team')
	<section class="content container-fluid">
	
	<div class="box box-primary" style="margin-top: 15px; margin-left: 10px;">
            <div class="box-body box-profile" style="margin-left: 10px;">
        
<!--              <div class="register-box-body" style=" border-radius: 10px;">-->
   				 
				<h1>Update Your Profile: <small>(Edit your profile details here)</small></h1>
    		    
  				  <form action="/update/profile/{{Auth::user()->id}}/{{Auth::user()->team_id}}/{{Auth::user()->company_id}}/{{Auth::user()->employee_id}}" method="post">
  				  @csrf
   				   <div class="form-group has-feedback" style="width: 500px; margin-top: 25px;">
					   <label for="team_name">Team Name</label>
     				   <input type="text" class="form-control  {{ $errors->has('team_name') ? ' is-invalid' : '' }}" value="{{ $errors->has('team_name') ? '' : $team->team_name }}" name="team_name" placeholder="Team Name">
     				   <span class="fa fa-user form-control-feedback"></span>
					   @if ($errors->has('team_name'))
    					<span class="invalid-feedback" role="alert" style="color: darkred;">
      				  		{{ $errors->first('team_name') }}
     			 		</span>
     			 		@endif
     			  </div>
   				  
      			  <div class="form-group has-feedback" style="width: 500px;">
					<label for="company_name">Company Name</label>
        			<select class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" id="company_name">
						@foreach($companies as $comp)
						{	
							<option value="{{$comp->cid}}" @if ($team->company_id == $comp->cid)
        					selected="selected"
    						@endif>{{$comp->comp_name}}</option>
						}
						@endforeach
					</select
        			<span class="fa fa-phone form-control-feedback"></span>
					@if ($errors->has('company_name'))
      				<span class="invalid-feedback" role="alert" style="color: darkred;">
        				{{ $errors->first('company_name') }}
      				</span>
      				@endif
      			</div>
      			
      			<div class="form-group has-feedback" style="width: 500px;">
					 <label for="email">Email</label>
        			<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $errors->has('email') ? '' : Auth::user()->email }}" name="email" placeholder="Email">
        			<span class="fa fa-envelope form-control-feedback"></span>
					@if ($errors->has('email'))
        			<span class="invalid-feedback" role="alert" style="color: darkred;">
          				{{ $errors->first('email') }}
        			</span>
      				@endif 
      			</div>
      			 
				<div class="form-group has-feedback" style="width: 500px;">
					<label for="address">Address</label>
        			<input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ $errors->has('address') ? '' : Auth::user()->address }}" name="address" placeholder="Address">
        			<span class="fa fa-user form-control-feedback"></span>
					@if ($errors->has('address'))
        			<span class="invalid-feedback" role="alert" style="color: darkred;">
          				{{ $errors->first('address') }}
        			</span>
      				@endif
      			</div>
				
				<div class="form-group has-feedback" style="width: 500px;">
					<label for="phone">Phone Number</label>
        			<input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $errors->has('phone') ? '' : Auth::user()->phone }}" name="phone" placeholder="Phone">
        			<span class="fa fa-user form-control-feedback"></span>
					@if ($errors->has('phone'))
        			<span class="invalid-feedback" role="alert" style="color: darkred;">
          				{{ $errors->first('phone') }}
        			</span>
      				@endif
      			</div>
					  
      			<div class="form-group has-feedback" style="width: 500px;">
					<label for="username">Username</label>
        			<input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ $errors->has('username') ? '' : Auth::user()->username }}" name="username" placeholder="Username">
        			<span class="fa fa-user form-control-feedback"></span>
					@if ($errors->has('username'))
        			<span class="invalid-feedback" role="alert" style="color: darkred;">
          				{{ $errors->first('username') }}
        			</span>
      				@endif
      			</div>
      			 
				<label>If you want to change password <a href="{{route('password.request')}}">visit here</a></label>
<!--
				<div class="form-group has-feedback" style="width: 500px;">
				 	<label for="password">Password</label>
        			<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" name="password" placeholder="Password">
        		<span class="fa fa-lock form-control-feedback"></span>
      			</div>
     		 	@if ($errors->has('password'))
      			<span class="invalid-feedback" role="alert">
        			<strong>{{ $errors->first('password') }}</strong>
      			</span>
       			@endif
				<div class="form-group has-feedback" style="width: 500px;">
				 	<label for="con_password">Confirm Password</label>
        			<input type="password" class="form-control {{ $errors->has('con_password') ? ' is-invalid' : '' }}" placeholder="Confirm New Password" name="con_password" >
        			<span class="fa fa-lock form-control-feedback"></span>
      			</div>
      			@if ($errors->has('con_password'))
        		<span class="invalid-feedback" role="alert">
          				<strong>{{ $errors->first('con_password') }}</strong>
        		</span>
      			@endif
-->
				
      			<div class="row">
						<input type="submit" class="btn btn-primary" value="Update" style="width: 80px; margin-left: 20px;">
						<a class="btn btn-primary btn-close" href="{{ url('/profile') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       			</div>
        		
    	</form>
  </div>
  </div>
      
    </section>
	@elseif(Auth::user()->role_name == 'Company')
	<section class="content container-fluid">
	
	<div class="box box-primary" style="margin-top: 15px; margin-left: 10px;">
            <div class="box-body box-profile" style="margin-left: 10px;">
        
<!--              <div class="register-box-body" style=" border-radius: 10px;">-->
   				 
				<h1>Update Your Profile: <small>(Edit your profile details here)</small></h1>
    		    
  				  <form action="/update/profile/{{Auth::user()->id}}/{{Auth::user()->team_id}}/{{Auth::user()->company_id}}/{{Auth::user()->employee_id}}" method="post">
  				  @csrf
   				   <div class="form-group has-feedback" style="width: 500px; margin-top: 25px;">
					   <label for="comp_name">Company Name</label>
     				   <input type="text" class="form-control  {{ $errors->has('comp_name') ? ' is-invalid' : '' }}" value="{{ $errors->has('comp_name') ? '' : $company->comp_name }}" name="comp_name" placeholder="Company Full Name">
     				   <span class="fa fa-user form-control-feedback"></span>
					   @if ($errors->has('comp_name'))
    					<span class="invalid-feedback" role="alert" style="color: darkred;">
      				  		{{ $errors->first('comp_name') }}
     			 		</span>
     			 		@endif
     			  </div>
      			
				<div class="form-group has-feedback" style="width: 500px;">
					 <label for="comp_url">Company URL</label>
        			<input type="comp_url" class="form-control {{ $errors->has('comp_url') ? ' is-invalid' : '' }}" value="{{ $errors->has('comp_url') ? '' : $company->comp_url }}" name="comp_url" placeholder="Company URL">
        			<span class="fa fa-globe form-control-feedback"></span>
					@if ($errors->has('comp_url'))
        			<span class="invalid-feedback" role="alert" style="color: darkred;">
          				{{ $errors->first('comp_url') }}
        			</span>
      				@endif 
      			</div>
					  
      			<div class="form-group has-feedback" style="width: 500px;">
					 <label for="email">Email</label>
        			<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $errors->has('email') ? '' : Auth::user()->email }}" name="email" placeholder="Email">
        			<span class="fa fa-envelope form-control-feedback"></span>
					@if ($errors->has('email'))
        			<span class="invalid-feedback" role="alert" style="color: darkred;">
          				{{ $errors->first('email') }}
        			</span>
      				@endif 
      			</div>
      			
				<div class="form-group has-feedback" style="width: 500px;">
					 <label for="address">Address</label>
      			 	 <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Address">{{ $errors->has('address') ? '' : Auth::user()->address }}</textarea>
      				 <span class="fa fa-home form-control-feedback"></span>
					@if ($errors->has('address'))
      			 	<span class="invalid-feedback" role="alert" style="color: darkred;">
        				{{ $errors->first('address') }}
      				</span>
     			 	@endif
      			 </div>
					  
				<div class="form-group has-feedback" style="width: 500px;">
					<label for="phone">Phone Number</label>
        			<input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $errors->has('phone') ? '' : Auth::user()->phone }}" name="phone" placeholder="Phone">
        			<span class="fa fa-phone form-control-feedback"></span>
					@if ($errors->has('phone'))
        			<span class="invalid-feedback" role="alert" style="color: darkred;">
          				{{ $errors->first('phone') }}
        			</span>
      				@endif
      			</div>
					  
      			<div class="form-group has-feedback" style="width: 500px;">
					<label for="username">Username</label>
        			<input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ $errors->has('username') ? '' : Auth::user()->username}}" name="username" placeholder="Username">
        			<span class="fa fa-user form-control-feedback"></span>
					@if ($errors->has('username'))
        			<span class="invalid-feedback" role="alert" style="color: darkred;">
          				{{ $errors->first('username') }}
        			</span>
      				@endif
      			</div>
      			 
				<label>If you want to change password <a href="{{route('password.request')}}">visit here</a></label>
<!--
				<div class="form-group has-feedback" style="width: 500px;">
				 	<label for="password">Password</label>
        			<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" name="password" placeholder="Password">
        		<span class="fa fa-lock form-control-feedback"></span>
      			</div>
     		 	@if ($errors->has('password'))
      			<span class="invalid-feedback" role="alert">
        			<strong>{{ $errors->first('password') }}</strong>
      			</span>
       			@endif
				<div class="form-group has-feedback" style="width: 500px;">
				 	<label for="con_password">Confirm Password</label>
        			<input type="password" class="form-control {{ $errors->has('con_password') ? ' is-invalid' : '' }}" placeholder="Confirm New Password" name="con_password" >
        			<span class="fa fa-lock form-control-feedback"></span>
      			</div>
      			@if ($errors->has('con_password'))
        		<span class="invalid-feedback" role="alert">
          				<strong>{{ $errors->first('con_password') }}</strong>
        		</span>
      			@endif
-->
				
      			<div class="row">
						<input type="submit" class="btn btn-primary" value="Update" style="width: 80px; margin-left: 20px;">
						<a class="btn btn-primary btn-close" href="{{ url('/profile') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       			</div>
        		
    	</form>
  </div>
  </div>
      
    </section>
	@else
	<section class="content container-fluid">

	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                <strong>Update Your Profile Here.</strong>
                            </h2>
						<!--
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
-->
                        </div>
                        <div class="body">
                            <form action="/update/profile/{{Auth::user()->id}}/{{Auth::user()->team_id}}/{{auth::user()->company_id}}/{{Auth::user()->employee_id}}" method="post" enctype="multipart/form-data">
  							 @csrf
                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $errors->has('name') ? '' : Auth::user()->name }}" name="name" placeholder="Full Name">
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
                                        <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Address">{{ $errors->has('address') ? '' : Auth::user()->address }} </textarea>
                                    </div>
									 @if ($errors->has('address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('address') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="phone">Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $errors->has('phone') ? '' : Auth::user()->phone }}" name="phone" placeholder="Phone Number">
        							</div>
									 @if ($errors->has('phone'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('phone') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="emp_image">Employee's Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <img src="{{asset('storage/imgs/'.$emp->emp_image)}}" width="70px" height="70px" style="margin-left: 10px;" name="image">&nbsp;{{$emp->emp_image}}<br><br>
        								<input type="file" name="emp_image" id="emp_image">
                                    </div>
									 @if ($errors->has('emp_image'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_image') }}
     			 					</span>
     			 					@endif
                                </div>
								<br>
									
								<script>
									$('#img').on('change', function(){
									var img=$(this).val();
						
									console.log(img);
								})
					  			</script>
								
								<label for="emp_designation">Employee's Designation</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control {{ $errors->has('emp_designation') ? ' is-invalid' : '' }}" name="emp_designation" id="emp_designation">
						
										@foreach($designation as $des)
										{	
											<option value="{{$des->des_id}}" @if ($des->des_id == $emp->emp_designation)
        									selected="selected"
    										@endif>{{$des->designation}}</option>
										}
										@endforeach
										</select>
                                    </div>
									 @if ($errors->has('emp_designation'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_designation') }}
     			 					</span>
     			 					@endif
                                </div>
								<br>
									
								<label for="comp_name">Employee's Company Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control {{ $errors->has('comp_name') ? ' is-invalid' : '' }}" name="comp_name" id="comp_name">
						
										@foreach($companies as $comp)
										{	
											<option value="{{$comp->cid}}" @if ($comp->cid == $emp->company_id)
        									selected="selected"
    										@endif>{{$comp->comp_name}}</option>
										}
										@endforeach
										</select>
                                    </div>
									 @if ($errors->has('comp_name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('comp_name') }}
     			 					</span>
     			 					@endif
                                </div>
								<br>
								
								<script>
									$('#comp_name').on('change', function(event) {
										var x = $(this).val();
										console.log(x);
										$.get("{{ url('api/dropdown')}}", 
											  { id: x }, 
											  function(data) {
											console.log(data)
											var team = $('#team_name');
											team.empty();
								 
											$.each(data, function(index, element) {
												team.append("<option value='"+ element.tid +"'>" + element.team_name + "</option>");
											});
										});        
									});
								</script>
								
								<label for="team_name">Employee's Team Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                      <select class="form-control {{ $errors->has('team_name') ? ' is-invalid' : '' }}" name="team_name" id="team_name">
										<option value="{{$team->tid}}">{{$team->team_name}}</option>
									  </select>
                                    </div>
									 @if ($errors->has('team_name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('team_name') }}
     			 					</span>
     			 					@endif
                                </div>
								<br>
								
								<label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $errors->has('email') ? '' : Auth::user()->email }}"  name="email" placeholder="Email">
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
                                        <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ $errors->has('username') ? '' : Auth::user()->username }}" name="username" placeholder="Username">
                                    </div>
									 @if ($errors->has('username'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('username') }}
     			 					</span>
     			 					@endif
                                </div>	
								
								<label for="emp_salary">Salary</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('emp_salary') ? ' is-invalid' : '' }}" value="{{ $errors->has('emp_salary') ? '' : $emp->emp_salary }}"  name="emp_salary" placeholder="Salary">
                                    </div>
									 @if ($errors->has('emp_salary'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_salary') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label>If you want to change password <a href="{{route('password.request')}}">visit here</a></label>
								
                                <br>
                                <div class="row">
						<input type="submit" class="btn btn-primary" value="Update" style="width: 80px; margin-left: 20px;">
						<a class="btn btn-primary btn-close" href="{{ url('/profile') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       					</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

	</section>
	@endif
    <!-- /.content -->
