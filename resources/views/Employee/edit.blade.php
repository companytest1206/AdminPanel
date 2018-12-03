@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-stepper/dist/css/bs-stepper.min.css">
<link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('Multi-File-Uploader-jQuery-uploadHBR/dist/css/style.min.css') }}" rel="stylesheet">
<!--<link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet">-->
<!--<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous">
</script>
<script src="{{ asset('Multi-File-Uploader-jQuery-uploadHBR/dist/js/uploadHBR.min.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="https://unpkg.com/bs-stepper/dist/js/bs-stepper.min.js"></script>

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
    <li><a href="/employees"><i class="material-icons">person</i> Employees</a></li>
    <li class="active"><i class="material-icons">edit</i> Edit Employee</li>
</ol>
<section class="content">
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
					<div class="card">
                        <div class="header bg-blue">
                            <h2>UPDATE EMPLOYEE DETAILS</h2>
                        </div>
						
                        <div class="body">
							<form action="{{url('employees/edit',[$employee->emp_id])}}" method="POST" enctype="multipart/form-data" >
  							@csrf
							<div id="stepper-example" class="bs-stepper">
  								<div class="bs-stepper-header">
    								<div class="step" data-target="#test-l-1">
      									<a onClick="myStepper.next()" style="cursor: context-menu">
        									<span class="bs-stepper-circle">1</span>
        									<span class="bs-stepper-label">Personal Information</span>
      									</a>
    								</div>
    								<div class="line"></div>
    								<div class="step" data-target="#test-l-2">
   										<a onClick="myStepper.previous()" style="cursor: context-menu">
											<span class="bs-stepper-circle">2</span>
        									<span class="bs-stepper-label">Professional Information</span>
      									</a>
    								</div>
  									</div>
  									<div class="bs-stepper-content">
   										<div id="test-l-1" class="content">
<!--      										<p class="text-center">test 1</p>-->
												
												<fieldset>
													
								<label> Name</label>
								@php $name = explode(" ", $employee->name)  @endphp
								<div class="form-group">
                                    <div class="form-line" style="width: 300px; float: left">
                                        <input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" placeholder="Full Name" value="{{ $errors->has('fname') ? '' : $name[0] }}" id="fname" >
                                    </div>
									 @if ($errors->has('fname'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('fname') }}
     			 					</span>
									@endif
									<div class="form-line" style="width: 300px; display: inline-block; margin-left: 90px">
                                        <input type="text" class="form-control {{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" placeholder="Full Name" value="{{ $errors->has('mname') ? '' : $name[1] }}" id="mname" >
                                    </div>
									 @if ($errors->has('mname'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('mname') }}
     			 					</span>
     			 					@endif
									<div class="form-line" style="width: 300px; float: right">
                                        <input type="text" class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" placeholder="Full Name" value="{{ $errors->has('lname') ? '' : $name[2] }}" id="lname" >
                                    </div>
									 @if ($errors->has('lname'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('lname') }}
     			 					</span>
									@endif
                                </div>
	
													
								<div><label for="dob"> Date Of Birth</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Please select date of birth of this employee." name="dob" value="{{ $errors->has('dob') ? '' : old('dob') }}" id="dob">
                                    </div>
									 @if ($errors->has('dob'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('dob') }}
     			 					</span>
     			 					@endif
                                </div></div>
								
								<label for="contact"> Contact No.</label>
                                <div class="form-group" id="contact">
									<label for="contact" style="display: inline-block; margin-top: 10px;">(1)</label>
                                    <div class="form-line" style="width: 1050px; float: right;">
                                       <input type="text" class="form-control mobile-phone-number{{ $errors->has('cont_no1') ? ' is-invalid' : '' }}" name="cont_no1" placeholder="Phone Number (1)" value="{{ $errors->has('cont_no1') ? '' : $employee->contact_no1 }}" id="cont_no1">
                                    </div>
									@if ($errors->has('cont_no1'))
    								<span class="invalid-feedback" role="alert" style="color: red; float: right; margin-right: 850px">
      				  					{{ $errors->first('cont_no1') }}
     			 					</span>
     			 					@endif
								</div>
								
								<div class="form-group" id="contact">
									<label for="contact" style="display: inline-block; margin-top: 10px;">(2)</label>
									<div class="form-line" style="width: 1050px; float: right;">
                                       <input type="text" class="form-control mobile-phone-number{{ $errors->has('cont_no2') ? ' is-invalid' : '' }}" name="cont_no2" placeholder="Phone Number (2)" value="{{ $errors->has('cont_no2') ? '' : $employee->contact_no2 }}" id="cont_no2">
                                    </div>
                                </div>
								
								<label for="emailId"> Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control {{ $errors->has('emailId') ? ' is-invalid' : '' }}" name="emailId" placeholder="Email Address" value="{{ $errors->has('emailId') ? '' : $employee->emailId }}" id="emailId">
                                    </div>
									 @if ($errors->has('emailId'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emailId') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<input type="hidden" id="status" value="{{ $employee->marital_status }}">
								<label for="marital_status"> Marital Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                			<input name="marital_status" type="radio" id="married" class="with-gap radio-col-blue" value="Married">
										<label for="married">Married</label>
                                			<input name="marital_status" type="radio" id="unmarried" class="with-gap radio-col-blue" value="Un-married"> 
										<label for="unmarried">Un-married</label>
                						
                                    </div>
									 @if ($errors->has('marital_status'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('marital_status') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<script>
									
									if($('#status').val() == 'married')
									{
										$('input:radio[id="married"]').attr('checked', true);

									}
									else
									{
										$('input:radio[id="unmarried"]').attr('checked', true);
									}
									
									$('input[type=file]').on('change', function(){
										var img=$(this).val();
						
										console.log(img);
									})
									$("label[for='married']").click(function (e){
										if($('input:radio[id="unmarried"]').is(':checked'))
										{
											$('input:radio[id="unmarried"]').removeAttr('checked');
										}
										$('input:radio[id="married"]').attr('checked', true);
										
										$('input:radio[id="married"]').val('Married');
									})
									$("label[for='unmarried']").click(function (e){
										if($('input:radio[id="married"]').is(':checked'))
										{
											$('input:radio[id="married"]').removeAttr('checked');
										}
										$('input:radio[id="unmarried"]').attr('checked', true);
										
										$('input:radio[id="unmarried"]').val('Un-married');
									})
								</script>	
								
								<label for="family_members"> Family Members</label>
                                <div class="form-group">
                                    <div class="form-line">
                                       <input type="text" class="form-control {{ $errors->has('family_members') ? ' is-invalid' : '' }}" name="family_members" placeholder="Family Members" value="{{ $errors->has('family_members') ? '' : $employee->family_members }}" id="family_members">
                                    </div>
									 @if ($errors->has('family_members'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('family_members') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="address_id"> Address</label><br>
								<div class="form-group">
									<label for="permanent_address"> Permanent Address</label>
                                    <div class="form-line">
                                        <textarea class="form-control {{ $errors->has('permanent_address') ? ' is-invalid' : '' }}" value="{{ $errors->has('permanent_address') ? '' : old('permanent_address') }}" name="permanent_address" placeholder="Permanent Address" id="permanent_address">{{ $errors->has('permanent_address') ? '' : $employee->perm_address }}</textarea>
                                    </div>
									 @if ($errors->has('permanent_address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('permanent_address') }}
     			 					</span>
     			 					@endif
                                </div>
							    
								<div class="form-line" style="float: right">
                                	<input name="same" type="checkbox" id="same" class="chk-col-blue filled-in" /> 
										<label for="same">Same as Permenant Address</label>		
                                </div>
							
								<script>
									 $("#same").on("click", function(){
										 if (this.checked) { 
											 $("#local_address").val($("#permanent_address").val());                     
										 }
										 else {
											 $("#local_address").val('');        
										 }
									 });
								</script>
							
								<div class="form-group">
									<label for="local_address"> Local Address</label>
                                    <div class="form-line">
                                        <textarea class="form-control {{ $errors->has('local_address') ? ' is-invalid' : '' }}" value="{{ $errors->has('local_address') ? '' : old('local_address') }}" name="local_address" placeholder="Local Address" id="local_address">{{ $errors->has('local_address') ? '' : $employee->local_address }}</textarea>
                                    </div>
									 @if ($errors->has('local_address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('local_address') }}
     			 					</span>
     			 					@endif
                                </div>
								<style>
									.upload-portfolio-img {
										height: 150px;
										line-height: 208px;
										width: 150px;
										border-radius: 7px;
										border-top-left-radius: 7px!important;
										border-top-right-radius: 7px!important;
										cursor: pointer;
									}
									.position-relative {
										position: relative !important;
									}

									.position-absolute {
										position: absolute !important;
										box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.1)!important;
									}
									.upload-padding {
										line-height: 0;
										width: 100%;
										cursor: pointer;
										padding: 15px 20px;
									}
									.upload-portfolio-img .remove {
										text-align: right;
										color: white;
										width: 150px;
										padding: 7px;
										border-radius: 5px;
										position: absolute;
										background-color: #373435;
										opacity: .4;
										height: 25px;
										z-index: 130;
									}
								</style>												
								
								<!--
                                <div class="row">
    								<div class="col-xs-12 col-md-12">
      									<div class="col-md-12 col-lg-12 col-xs-12" id="columns">
											<small style="margin-left: 10px">(Update image here and Only jpeg, jpg and png extensions are allowed!)</small><br><br>
        									<div id="uploads"> Upload Content </div>
      									</div>
      									<button class="btn btn-danger btn-lg pull-left" id="reset" type="button"><i class="fa fa-refresh"></i> &nbsp;Clear</button>
    								</div>
  								</div>
-->
													
								<label for="image"> Image</label><br><br>
										<div class="upload-portfolio-img" style="display: inline-block;">
										  <img src="{{ asset('storage/imgs/' . $employee->image) }}" class="position-absolute" style="top: 50%; text-align: center; transform: translateX(-50%) translateY(-50%); width: 150px; height: 150px; margin-top: 395px; text-align: left; margin-left: 75px; border-radius: 7px" id="profileimg">
										  <div class="position-relative" style="opacity: 0; padding: 50px 5px">
										  <input type="file" class="form-control-file upload-padding" id="image" name="image">
										  </div>
										</div><br>	
										<input type="hidden" id="upload" value="{{ asset('storage/imgs/' . $employee->image) }}">
								<script>
							
									function readURL(input) {
										if (input.files && input.files[0]) {
											var reader = new FileReader();
											
											reader.onload = function (e) {
												$('#profileimg')
													.attr('src', e.target.result);
											};

											reader.readAsDataURL(input.files[0]);
											$('.upload-portfolio-img').prepend('<a class="remove" title="Click here to deselct the image" style="float: right; id="reset" onclick="upload()"><i class="fa fa-times"></i></a>');
										}
									}
									$("#image").change(function() {
										readURL(this);
									});
												
//									uploadHBR.init({
//										"target": "#uploads",
//										"textNew": "<center>ADD</center>",
//										"max": 1,
//									});
//	
									function upload() {
										//uploadHBR.reset('#uploads');
										$('#profileimg').attr('src',$('#upload').val());
									};
								</script>

								<label for="remarks">Remarks</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control {{ $errors->has('remarks') ? ' is-invalid' : '' }}" value="{{ $errors->has('remarks') ? '' : old('remarks') }}" name="remarks" placeholder="Remarks" id="remarks">{{ $errors->has('remarks') ? '' : $employee->remarks }}</textarea>
                                    </div>
									 @if ($errors->has('remarks'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('remarks') }}
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
									
									$('#image').change(function() {
										console.log($(this).val());	
									})
								</script>
                           		</fieldset>
											
												<a class="btn btn-primary" onclick="myStepper.next()"><i class="fa fa-mail-forward"></i> Next</a>
    									</div>
    									<div id="test-l-2" class="content">
<!--      										<p class="text-center">test 2</p>-->
												
												<fieldset>
									
								<label for="emp_type"> Type of Employee</label>
                                <div class="form-group">
                                    <div class="form-line">
									@if($employee->emp_type_id == '1')
										<input type="text" class="form-control {{ $errors->has('emp_type') ? ' is-invalid' : '' }}" name="emp_type" value="{{ $errors->has('emp_type') ? '' : $employee->emp_type }}" id="emp_type" disabled style="color: grey">
										<input type="hidden" name="emp_type" value="1">
									@else	
										<select class="form-control {{ $errors->has('emp_type') ? ' is-invalid' : '' }}" name="emp_type" id="emp_type">
												<option value="">---Select the type of employee---</option>
												@foreach($emp_type as $emp)
												{	
													<option value="{{$emp->emp_type_id}}" @if($emp->emp_type_id == $employee->emp_type_id) selected @endif</option>{{$emp->emp_type}}</option>
												}
												@endforeach
										</select>
									@endif
                                    </div>
									
									 @if ($errors->has('emp_type'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emp_type') }}
     			 					</span>
     			 					@endif
                                </div>	
								
								<script>
									$(document).ready(function(e) {
	
									$('.mobile-phone-number').inputmask('+99 (999) 999-99-99', { placeholder: '+__ (___) ___-__-__' });
									var ted = '{{ $employee->training_end_date }}';
									//console.log(ted);
									console.log(moment().format("YYYY-MM-DD"));
									var jd = moment('{{ $employee->joining_date }}').format("dddd DD MMMM YYYY");
									var pd = moment('{{ $employee->probation_end_date }}').format("dddd DD MMMM YYYY");
									if(ted != 'NULL')
									{
										var td = moment('{{ $employee->training_end_date }}').format("dddd DD MMMM YYYY");
									}
									else
									{
										var td = moment().format("YYYY-MM-DD");
										//console.log(td);
									}
									var bd = moment('{{ $employee->bond_end_date }}').format("dddd DD MMMM YYYY");
									var cd = moment('{{ $employee->confirmation_date }}').format("dddd DD MMMM YYYY");
									var dob = moment('{{ $employee->DOB }}').format("dddd DD MMMM YYYY");

									$("#joining_date").val(jd);
									$("#probation_end_date").val(pd);
									$("#training_end_date").val(td);
									$("#bond_end_date").val(bd);
									$("#confirmation_date").val(cd);
									$("#dob").val(dob);	
										
									$("#joining_date").bootstrapMaterialDatePicker({
											weekStart : 0,
											setDate:  '{{ $employee->joining_date }}',
											format : 'dddd DD MMMM YYYY',
											clearButton: true,
											time: false
									});
										
									$("#probation_end_date").bootstrapMaterialDatePicker({
											weekStart : 0,
											setDate:  '{{ $employee->probation_end_date }}',
											format : 'dddd DD MMMM YYYY',
											time: false
									});
									
									if(ted != 'NULL')
									{
										$("#training_end_date").bootstrapMaterialDatePicker({
											weekStart : 0,
											setDate:  '{{ $employee->training_end_date }}',
											format : 'dddd DD MMMM YYYY',
											clearButton: true,
											time: false
										});
									}
									else
									{
										$('#training_end_date').bootstrapMaterialDatePicker({time: false, clearButton: true});
									}
										
									$("#bond_end_date").bootstrapMaterialDatePicker({
											weekStart : 0,
											setDate:  '{{ $employee->bond_end_date }}',
											format : 'dddd DD MMMM YYYY',
											time: false
									});
										
									$("#confirmation_date").bootstrapMaterialDatePicker({
											weekStart : 0,
											setDate:  '{{ $employee->confirmation_date }}',
											format : 'dddd DD MMMM YYYY',
											clearButton: true,
											time: false
									});
										
									$("#dob").bootstrapMaterialDatePicker({
											weekStart : 0,
											setDate:  '{{ $employee->DOB }}',
											format : 'dddd DD MMMM YYYY',
											clearButton: true,
											time: false
									});
									//console.log($('#emp_type').val());
									if($('#emp_type').val() == '1' || $('#emp_type').val() == 'Employee')
									{
										$('#tp').hide();
										$('#ted').hide();
										$(this).css('disabled', true);
										$('#joining_date').css('disabled', true);
										$('#bond_period').css('disabled', true);
										$('#probation_period').css('disabled', true);
										$('#probation_end_date').css('disabled', true);
										$('#bond_end_date').css('disabled', true);
										$('#confirmation_date').css('disabled', true);
									}
									else
									{
										$('#tp').css('display','block');
										$('#ted').css('display','block');
										$('#joining_date').css('disabled', true);
										$('#bond_period').css('disabled', true);
										$('#training_period').css('disabled', true);
										$('#probation_period').css('disabled', true);
										$('#probation_end_date').css('disabled', true);
										$('#training_end_date').css('disabled', true);
										$('#bond_end_date').css('disabled', true);
										$('#confirmation_date').css('disabled', true);
									}
										
									$('#emp_type').on('change', function(){
										var type=$(this).val();
										//console.log(type);
										if(type == '1')
										{
											$('#tp').hide();
											$('#ted').hide();
										}
										else
										{
											//console.log('yes');
											$('#tp').css('display','block');
											$('#ted').css('display','block');
										}
									})
									})
								</script>
							
								<label for="designation"> Designation</label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{ $errors->has('designation') ? '' : $employee->designation }}" id="designation">
                                    </div>
									 @if ($errors->has('designation'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('designation') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="joining_date"> Joining Date</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Please select joining date of this employee." name="joining_date" value="{{ $errors->has('joining_date') ? '' : old('joining_date')}}" id="joining_date">
                                    </div>
									 @if ($errors->has('joining_date'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('joining_date') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="bond_period"> Bond Period</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('bond_period') ? ' is-invalid' : '' }}" name="bond_period" placeholder="Bond Period" value="{{ $errors->has('bond_period') ? '' : $employee->bond_period }}" id="bond_period">
                                    </div>
									 @if ($errors->has('bond_period'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('bond_period') }}
     			 					</span>
     			 					@endif
                                </div>
								
								
								<div id="tp"><label for="training_period"> Training Period</label>
                                <div class="form-group">
									<div class="form-line">
                                    <select class="form-control {{ $errors->has('training_period') ? ' is-invalid' : '' }}" name="training_period" id="training_period">
										<option value="">---Select training period---</option>	
										@foreach($period as $per)
											<option value="{{ $per->id }}" @if ($employee->training_period == $per->id)
        										selected="selected"
    												@endif>{{ $per->period }} months</option>
										@endforeach
									</select>
									</div>
									 @if ($errors->has('training_period'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('training_period') }}
     			 					</span>
     			 					@endif              
                                </div></div>
			
							
								<label for="probation_period"> Probation Period</label>
                                <div class="form-group">
                                    <div class="form-line">
										<select class="form-control {{ $errors->has('probation_period') ? ' is-invalid' : '' }}" name="probation_period" id="probation_period">
											<option value="">---Select probation period---</option>	
											@foreach($period as $per)
												<option value="{{ $per->id }}" @if ($employee->probation_period == $per->id)
        										selected="selected"
    												@endif>{{ $per->period }} months</option>
											@endforeach
										</select>
                                    </div>
									 @if ($errors->has('probation_period'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('probation_period') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<div><label for="probation_end_date"> Probation End Date</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Please select probabtion end date of this employee." name="probation_end_date" value="{{ $errors->has('probation_end_date') ? '' : old('probation_end_date') }}" id="probation_end_date">
                                    </div>
									 @if ($errors->has('probation_end_date'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('probation_end_date') }}
     			 					</span>
     			 					@endif
                                </div></div>
								
								
								<div id="ted"><label for="training_end_date"> Training End Date</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control {{ $errors->has('training_end_date') ? '' : old('training_end_date') }}" placeholder="Please select training end date of this employee." name="training_end_date" id="training_end_date">
                                    </div>
									 @if ($errors->has('training_end_date'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('training_end_date') }}
     			 					</span>
     			 					@endif
                                </div></div>
				
								
								<div><label for="bond_end_date"> Bond End Date</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class="form-control {{ $errors->has('bond_end_date') ? '' : old('bond_end_date') }}" placeholder="Please select bond end date of this employee." name="bond_end_date" id="bond_end_date">
                                    </div>
									 @if ($errors->has('bond_end_date'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('bond_end_date') }}
     			 					</span>
     			 					@endif
                                </div></div>
								
								<label for="salary"> Basic Salary</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" placeholder="Salary" value="{{ $errors->has('salary') ? '' : $employee->salary }}" id="salary">
                                    </div>
									 @if ($errors->has('salary'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('salary') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<div><label for="confirmation_date">Confirmation Date</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Please select confirmation date of this employee." name="confirmation_date" value="{{ $errors->has('confirmation_date') ? '' : old('confirmation_date') }}" id="confirmation_date">
                                    </div>
									 @if ($errors->has('confirmation_date'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('confirmation_date') }}
     			 					</span>
     			 					@endif
                                </div></div>
								
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
							   	</fieldset>
											
												<a class="btn btn-primary" onclick="myStepper.previous()" ><i class="fa fa-mail-reply"></i> Previous</a>
      											<button type="submit" class="btn btn-primary" style="float: right"><i class="fa fa-pencil"></i> Update</button>
    									</div>
  									</div>
								</div>
								<script>
								$(document).ready(function () {
										myStepper = new Stepper(document.querySelector('#stepper-example'),{
  										animation: true, linear: false
									})
								})
								</script>
							</form>
                        </div>
					</div>
					
                </div>
            </div>
</section>