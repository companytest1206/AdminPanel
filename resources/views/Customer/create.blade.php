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
    <li><a href="/customers"><i class="material-icons">wc</i> Customers</a></li>
    <li class="active"><i class="material-icons">add</i> New Customer</li>
</ol>
<section class="content">
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
							 <h2><strong>Add New Customer's Details here:</strong></h2>
	
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
                            <form action="{{ url('/customers/new') }}" method="post" name="cust_form">
  							@csrf
					  
                                <label for="name">Customers's Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $errors->has('name') ? '' : old('name') }}" placeholder="Full name" id="name">
                                    </div>
									 @if ($errors->has('name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('name') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="address">Customer's Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ $errors->has('address') ? '' : old('address') }}" name="address" placeholder="Address" id="address"></textarea>
                                    </div>
									 @if ($errors->has('address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('address') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="phone">Customer's Phone No.</label>
                                <div class="form-group">
                                    <div class="form-line">
                                       <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Phone Number" value="{{ $errors->has('phone') ? '' : old('phone') }}" id="phone">
                                    </div>
									 @if ($errors->has('phone'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('phone') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="email">Customer's Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ $errors->has('email') ? '' : old('email') }}" id="email">
                                    </div>
									 @if ($errors->has('email'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('email') }}
     			 					</span>
     			 					@endif
                                </div>		
								
                                <br>
                                <div class="row">
									<input type="submit" class="btn btn-primary" value="Add" style="width: 80px; margin-left: 20px;" id="add">
									<a class="btn btn-primary btn-close" href="{{ url('/customers') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       							</div>
                            </form>
<!--
							<script>
									$('button#add').on('click', function (e) {
										//e.preventDefault();
										var url = $('#cust_form').attr('action');
										var name = $('#name').val();
										var address = $('#address').val();
										var phone = $('#phone').val();
										var email = $('#email').val();
										//console.log(msg);
										$.post(url, {  _token : $('#_token').val(), name: name, address: address, phone: phone, email: email }).done(function(data) {
											console.log(data);
											//$("#flash").html('Message saved as draft successfully!'); 
											//$("#flash").addClass("alert alert-success offset4 span4");
											var url = '/customers';
											window.location.href = url;
										}).fail(function(xhr, status, error) {
											console.log(xhr);
										})
									});
							</script>
-->
                        </div>
                    </div>
                </div>
            </div>
</section>