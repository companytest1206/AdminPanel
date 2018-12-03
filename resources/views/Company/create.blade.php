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
<ol class="breadcrumb breadcrumb-col-blue-grey pull-right">
    <li><a href="/home"><i class="material-icons">home</i> Home</a></li>
    <li><a href="/companies"><i class="material-icons">domain</i> Companies</a></li>
    <li class="active"><i class="material-icons">add</i> Add Company</li>
</ol>
<section class="content">
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
							 <h2><strong>Add New Company's Details here:</strong></h2>
								
						
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
                            <form action="{{ url('/companies/new') }}" method="post" name="cform">
  							@csrf
								<input type="hidden" id="_token" value="{{ csrf_token() }}">
					  
				  			 <input type="hidden" value="Company" name="role">
                                <label for="comp_name">Company's Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control  {{ $errors->has('comp_name') ? ' is-invalid' : '' }}" value="{{ $errors->has('comp_name') ? '' : old('comp_name') }}" name="comp_name" placeholder="Company's Name" id="comp_name">
                                    </div>
									 @if ($errors->has('comp_name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('comp_name') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="address">Company's Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Company's Address" id="address">{{ $errors->has('address') ? '' : old('address') }}</textarea>
                                    </div>
									 @if ($errors->has('address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('address') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="comp_url">Company's URL</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control  {{ $errors->has('comp_url') ? ' is-invalid' : '' }}" name="comp_url" placeholder="Company's URL" value="{{ $errors->has('comp_url') ? '' : old('comp_url') }}" id="comp_url">
                                    </div>
									 @if ($errors->has('comp_url'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('comp_url') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="phone">Company's Phone No.</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Company's Phone Number" value="{{ $errors->has('phone') ? '' : old('phone') }}" id="phone">
                                    </div>
									 @if ($errors->has('phone'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('phone') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="email">Company's Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Company's Email Address" value="{{ $errors->has('email') ? '' : old('email') }}" id="email">
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
                                        <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="" name="username" placeholder="Company's Username" value="{{ $errors->has('username') ? '' : old('username') }}" id="username">
                                    </div>
									 @if ($errors->has('username'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('username') }}
     			 					</span>
     			 					@endif
                                </div>	
								
								<label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line" >
                                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="" name="password" placeholder="Company's Password" id="password" style="display: inline-block; width: 900px">
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
                                    <div class="form-line" >
                                        <input type="password" class="form-control {{ $errors->has('con_password') ? ' is-invalid' : '' }}" value="" name="con_password" placeholder="Company's Retype Password" id="con_password" style="display: inline-block; width: 900px">							<span toggle="#con_password" class="fa fa-eye toggle-password" style="float: right; margin-top: 15px"></span>	
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
									<input type="submit" class="btn btn-primary button" value="Add" style="width: 80px; margin-left: 20px;" id="add">
									<a class="btn btn-primary btn-close" href="{{ url('/companies') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       							</div>
                            </form>
<!--
							<script>
									$('button#add').on('click', function (e) {
										//e.preventDefault();
										var url = $('#cform').attr('action');
										var name = $('#comp_name').val();
										var address = $('#address').val();
										var comp_url = $('#comp_url').val();
										var phone = $('#phone').val();
										var email = $('#email').val();
										var username = $('#username').val();
										var password = $('#password').val();
										var con_password = $('#con_password').val();
										//console.log(msg);
										$.post(url, {  _token : $('#_token').val(), name: name, address: address, comp_url: comp_url, phone: phone, email: email, username: username, password: password, con_password: con_password}).done(function(data) {
											console.log(data);
											//$("#flash").html('Message saved as draft successfully!'); 
											//$("#flash").addClass("alert alert-success offset4 span4");
											var url = '/companies';
											window.location.href = url;
										}).fail(function(xhr, status, error) {
											console.log(xhr);
										})
										})
									})
							</script>
-->
                        </div>
                    </div>
                </div>
            </div>
</section>