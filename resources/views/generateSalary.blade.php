@extends('layouts.app')
<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
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
    <li class="active"><i class="material-icons">content_paste</i> Generate Salary Slip</li>
</ol>
<section class="content">
	<div class="row clearfix" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header bg-blue">
				<h2><strong>Generate Employee's Salary Slip:</strong></h2>
	
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
			@if(Auth::user()->role_name === 'Admin')
        
			<div class="body">
								<form action="{{ url('/generate') }}" method="post">
								@csrf

									<label for="emp_name">Employee's Name</label><small>&nbsp;&nbsp;(Please select employee name and dont edit other data!)</small><br>
									<div class="form-group">
									<div class="form-line">
										<select class="form-control {{ $errors->has('emp_name') ? '' : old('emp_name') }}" name="emp_name" id="emp_name">
										<option value="">---Select Employee name---</option>
										@foreach($employees as $emp)
										{	
											<option value="{{$emp['emp_name']}}">{{$emp['emp_name']}}</option>
										}
										@endforeach
										</select>
										
									</div>
									@if ($errors->has('emp_name'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('emp_name') }}
										</span>
									@endif
									</div>
									<br>

									<script>
									$('#emp_name').on('change', function(event) {
									var x = $(this).val();
										console.log(x);
										$.get("{{ url('api/details')}}", 
											  { name: x }, 
											  function(data) {
											console.log(data);
											$("#emp_designation").removeAttr('disabled');
											$("#company_name").removeAttr('disabled');
											$("#team_name").removeAttr('disabled');
											$("#address").removeAttr('disabled');
											$("#emp_salary").removeAttr('disabled');
											$.each(data, function(index, element) {
												$('#emp_designation').val(element.designation);
												$('#company_name').val(element.comp_name);
												$('#team_name').val(element.team_name);
												$('#address').val(element.address);
												$('#emp_salary').val(element.emp_salary);
											});
										});        
									});  
									</script>

									<label for="company_name">Company Name</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" id="company_name" name="company_name" placeholder="Company Name" value="{{ $errors->has('company_name') ? '' : old('company_name') }}" disabled>
										</div>
										 @if ($errors->has('company_name'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('company_name') }}
										</span>
										@endif
									</div>

									<label for="emp_designation">Designation</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control {{ $errors->has('emp_designation') ? ' is-invalid' : '' }}" id="emp_designation" name="emp_designation" placeholder="Employee Designation" value="{{ $errors->has('emp_designation') ? '' : old('emp_designation') }}" disabled>
										</div>
										 @if ($errors->has('emp_designation'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('emp_designation') }}
										</span>
										@endif
									</div>
									
									<label for="team_name">Team Name</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control {{ $errors->has('team_name') ? ' is-invalid' : '' }}" id="team_name" name="team_name" placeholder="Company Name" value="{{ $errors->has('team_name') ? '' : old('team_name') }}" disabled>
										</div>
										 @if ($errors->has('team_name'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('team_name') }}
										</span>
										@endif
									</div>

									<label for="email">Company Address</label>
									<div class="form-group">
										<div class="form-line">
											<textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" value="{{ $errors->has('address') ? '' : old('address') }}" name="address" placeholder="Company Address" disabled></textarea>
										</div>
										 @if ($errors->has('address'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('address') }}
										</span>
										@endif
									</div>

									<label for="emp_salary">Employee's Salary</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control {{ $errors->has('emp_salary') ? ' is-invalid' : '' }}" id="emp_salary" name="emp_salary" placeholder="Salary" value="{{ $errors->has('emp_salary') ? '' : old('emp_salary') }}" disabled>
										</div>
										 @if ($errors->has('emp_salary'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('emp_salary') }}
										</span>
										@endif
									</div>	

									<br>
									<div class="row">
									<input type="submit" class="btn btn-primary" value="Generate" style="width: 80px; margin-left: 20px;">
									<a class="btn btn-primary btn-close" href="{{ url('/home') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
									</div>
								</form>
				</div>
      
			@endif
			@if(Auth::user()->role_name === 'Company')
		
			<div class="body">
                            <form action="{{ url('/generate/salary') }}" method="post">
  							@csrf
					  
                                <label for="team_name">Employee's Name</label>
                       			<div class="form-group">
                             	<div class="form-line">
                                 	<input type="text" class="form-control  {{ $errors->has('emp_name') ? ' is-invalid' : '' }}" name="emp_name" value="{{ $errors->has('emp_name') ? '' : old('emp_name') }}" placeholder="Full name">
                              	</div>
								@if ($errors->has('team_name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('team_name') }}
     			 					</span>
     			 				@endif
                       			</div>
								<br>
								
								<label for="emp_address">Employee's Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control {{ $errors->has('emp_address') ? ' is-invalid' : '' }}" value="{{ $errors->has('emp_address') ? '' : old('emp_address') }}" name="emp_address" placeholder="Address"></textarea>
                                    </div>
									 @if ($errors->has('emp_address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_address') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="emp_phone">Employee's Phone No.</label>
                                <div class="form-group">
                                    <div class="form-line">
                                       <input type="text" class="form-control {{ $errors->has('emp_phone') ? ' is-invalid' : '' }}" name="emp_phone" placeholder="Phone Number" value="{{ $errors->has('emp_phone') ? '' : old('emp_phone') }}">
                                    </div>
									 @if ($errors->has('emp_phone'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_phone') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="email">Employee's Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ $errors->has('email') ? '' : old('email') }}">
                                    </div>
									 @if ($errors->has('email'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('email') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="emp_image">Employee's Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="emp_image" id="emp_image" {{ $errors->has('emp_image') ? ' is-invalid' : '' }}>
                                    </div>
									 @if ($errors->has('emp_image'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_image') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<script>
									$('input[type=file]').on('change', function(){
										var img=$(this).val();
						
										console.log(img);
									})
								</script>
								
								<label for="emp_gender">Employee's Gender</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <div class="radio" >
                                				<input name="gender" type="radio" id="male" class="with-gap radio-col-blue" />
											<label for="male">Male</label>
                                				<input name="gender" type="radio" id="female" class="with-gap radio-col-blue" /> 
											<label for="female">Female</label>
                						</div>
                                    </div>
									 @if ($errors->has('emp_gender'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_gender') }}
     			 					</span>
     			 					@endif
                                </div>

								<label for="emp_designation">Employee's Designation</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control {{ $errors->has('emp_designation') ? '' : old('emp_designation') }}" name="emp_designation" id="emp_designation">
										<option value="">---Select your Designation---</option>
											@foreach($designation as $des)
											{	
												<option value="{{$des->des_id}}">{{$des->designation}}</option>
											}
											@endforeach
										</select>
                                    </div>
									<input type="hidden" name="emp_role" value="Employee" id="emp_role">
									 @if ($errors->has('emp_designation'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_designation') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="company_name">Company Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @if(Auth::user()->role_name == 'Company' || Auth::user()->role_name == 'Team')
										<select class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" id="company_name">
										@foreach($company as $comp)
										{						
											<option value="{{$comp->cid}}" selected>{{$comp->comp_name}}</option>
										}
										@endforeach
										</select>
										@else
        								<select class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" id="company_name">
											<option value="">---Select your Company Name---</option>
											@foreach($companies as $comp)
											{	
												<option value="{{$comp->cid}}">{{$comp->comp_name}}</option>
											}
											@endforeach
										</select>
										<script>
											$('#company_name').on('change', function(event) {
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
									@endif
                                    </div>
									 @if ($errors->has('company_name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('company_name') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="team_name">Team Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    @if(Auth::user()->role_name == 'Company' || Auth::user()->role_name == 'Team')
										<select class="form-control {{ $errors->has('company_id') ? ' is-invalid' : '' }}" name="team_name" id="team_name">
										@foreach($teams as $team)
										{	
											<option value="{{$team->tid}}">{{$team->team_name}}</option>
										}
										@endforeach
										</select>
										@else
        								<select class="form-control {{ $errors->has('team_name') ? ' is-invalid' : '' }}" name="team_name" id="team_name">
											<option value="">---Select Company first---</option>
										</select>
									@endif
                                    </div>
									 @if ($errors->has('team_name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('team_name') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="username">Username</label>
                                <div class="form-group">
                                    <div class="form-line">
                                       <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Username" value="{{ $errors->has('username') ? '' : old('username') }}">
                                    </div>
									 @if ($errors->has('username'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('username') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="emp_salary">Employee's Salary</label>
                                <div class="form-group">
                                    <div class="form-line">
                                       <input type="text" class="form-control {{ $errors->has('emp_salary') ? ' is-invalid' : '' }}" name="emp_salary" placeholder="Salary" value="{{ $errors->has('emp_salary') ? '' : old('emp_salary') }}">
                                    </div>
									 @if ($errors->has('emp_salary'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_salary') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                       <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
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
                                      <input type="password" class="form-control {{ $errors->has('con_password') ? ' is-invalid' : '' }}" name="con_password" placeholder="Retype password">
                                    </div>
									 @if ($errors->has('con_password'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('con_password') }}
     			 					</span>
     			 					@endif
                                </div>Retype 
								
                                <br>
                                <div class="row">
								<input type="submit" class="btn btn-primary" value="Add" style="width: 80px; margin-left: 20px;">
								<a class="btn btn-primary btn-close" href="{{ url('/employees') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       							</div>
                            </form>
            </div>
				
			@endif
			</div>
       </div>
    </div>
</section>
