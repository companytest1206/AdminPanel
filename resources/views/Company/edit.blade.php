@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">
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
    <li><a href="/companies"><i class="material-icons">domain</i> Companies</a></li>
    <li class="active"><i class="material-icons">edit</i> Edit Company</li>
</ol>
<section class="content">
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
							<h2><strong>Update Company Details here:</strong></h2>							
						
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
                            <form action="/companies/edit/{{$company->cid}}/{{$c_user->id}}" method="post" name="cform">
  							@csrf
					  
				  			 <input type="hidden" value="Company" name="role">
                                <label for="comp_name">Company's Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control  {{ $errors->has('comp_name') ? ' is-invalid' : '' }}" value="{{ $errors->has('comp_name') ? '' : $company->comp_name}}" name="comp_name" placeholder="Company's Name" id="comp_name">
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
                                        <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Company's Address" id="address">{{ $errors->has('address') ? '' : $c_user->address}}</textarea>
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
                                        <input type="text" class="form-control  {{ $errors->has('comp_url') ? ' is-invalid' : '' }}" value="{{ $errors->has('comp_url') ? '' : $company->comp_url}}" name="comp_url" placeholder="Company's URL" id="comp_url">
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
                                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $errors->has('phone') ? '' : $c_user->phone}}" name="phone" placeholder="Company's Phone Number" id="phone">
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
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $errors->has('email') ? '' : $c_user->email}}" name="email" placeholder="Company's Email Address" id="email">
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
                                        <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ $errors->has('username') ? '' : $c_user->username}}" name="username" placeholder="Company's Username" id="username">
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
									<input type="submit" class="btn btn-primary" value="Update" style="width: 80px; margin-left: 20px;" id="update">
									<a class="btn btn-primary btn-close" href="{{ url('/companies') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       							</div>
                            </form>
							<script>
									$('button#update').on('click', function (e) {
										//e.preventDefault();
										var url = $('#cform').attr('action');
										var name = $('#comp_name').val();
										var address = $('#address').val();
										var comp_url = $('#comp_url').val();
										var phone = $('#phone').val();
										var email = $('#email').val();
										var username = $('#username').val();
										//console.log(msg);
										$.post(url, {  _token : $('#_token').val(), name: name, address: address, comp_url: comp_url, phone: phone, email: email, username: username }).done(function(data) {
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
                        </div>
                    </div>
                </div>
            </div>
</section>