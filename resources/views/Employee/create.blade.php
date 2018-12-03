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
<!--<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>-->

<!--<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>-->
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
    <li class="active"><i class="material-icons">person_add</i> Add Employee</li>
</ol>
<section class="content">
<div class="body">
	<div class="row clearfix" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<div class="card">
                        <div class="header bg-blue">
                            <h2>ADD NEW EMPLOYEE DETAILS</h2>
                        </div>
<!--						action="{{ url('/employees/new') }}"-->
                        <div class="body">
							
                        	<form method="POST" enctype="multipart/form-data" id="myform">
  							@csrf
								 
							<div id="stepper-example" class="bs-stepper">
  								<div class="bs-stepper-header">
    								<div class="step" data-target="#test-l-1">
      									<a style="cursor: context-menu">
											<span class="bs-stepper-circle">1</span>
        									<span class="bs-stepper-label">Personal Information</span>
      									</a>
    								</div>
    								<div class="line"></div>
    									<div class="step" data-target="#test-l-2">
   											<a style="cursor: context-menu">
        										<span class="bs-stepper-circle">2</span>
        										<span class="bs-stepper-label">Professional Information</span>
      										</a>
    									</div>
  									</div>
								
  									<div class="bs-stepper-content">
   										<div id="test-l-1" class="content">
<!--      										<p class="text-center">test 1</p>-->
											<br>
											
												<fieldset>
								
								<label> Full Name</label><br>
									<div class="form-group" style="width: 300px; float: left">
										<div class="form-line">
											<input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" placeholder="First Name" value="{{ $errors->has('fname') ? '' : old('fname') }}" id="fname" >
										</div>
										@if ($errors->has('fname'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('fname') }}
										</span>
										@endif
									</div>
								
									<div class="form-group" style="width: 300px; display: inline-block; margin-left: 90px">
										<div class="form-line">
											<input type="text" class="form-control {{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" placeholder="Middle Name" value="{{ $errors->has('mname') ? '' : old('mname') }}" id="mname" >
										</div>
										@if ($errors->has('mname'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('mname') }}
										</span>
										@endif
									</div>	
													
									<div class="form-group" style="width: 300px; float: right">
										<div class="form-line">
											<input type="text" class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" placeholder="Last Name" value="{{ $errors->has('lname') ? '' : old('lname') }}" id="lname" >
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
                                         <input type="text" class=" form-control" placeholder="Please select date of birth of this employee." name="dob"  id="dob">
                                    </div>
									 @if ($errors->has('dob'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('dob') }}
     			 					</span>
     			 					@endif
                                </div></div>
									
								<label for="emailId"> Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control {{ $errors->has('emailId') ? ' is-invalid' : '' }}" name="emailId" placeholder="Email Address" value="{{ $errors->has('emailId') ? '' : old('emailId') }}" id="emailId">
                                    </div>
									 @if ($errors->has('emailId'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('emailId') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="contact"> Contact No.</label>
                                <div class="form-group" id="contact">
									<label for="contact" style="display: inline-block; margin-top: 10px;">(1)</label>
                                    <div class="form-line" style="width: 1050px; float: right;">
                                       <input type="text" class="form-control mobile-phone-number{{ $errors->has('cont_no1') ? ' is-invalid' : '' }}" name="cont_no1" placeholder="Phone Number (1)" value="{{ $errors->has('cont_no1') ? '' : old('cont_no1') }}" id="cont_no1">
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
                                       <input type="text" class="form-control mobile-phone-number{{ $errors->has('cont_no2') ? ' is-invalid' : '' }}" name="cont_no2" placeholder="Phone Number (2)" value="{{ $errors->has('cont_no2') ? '' : old('cont_no2') }}" id="cont_no2">
                                    </div>
                                </div>
													
								<label for="marital_status"> Marital Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                			<input name="marital_status" type="radio" id="married" class="with-gap radio-col-blue" >
										<label for="married">Married</label>
                                			<input name="marital_status" type="radio" id="unmarried" class="with-gap radio-col-blue" > 
										<label for="unmarried">Un-married</label>
                						
                                    </div>
									 @if ($errors->has('marital_status'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('marital_status') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<script>
									
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
                                       <input type="text" class="form-control {{ $errors->has('family_members') ? ' is-invalid' : '' }}" name="family_members" placeholder="Family Members" value="{{ $errors->has('family_members') ? '' : old('family_members') }}" id="family_members">
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
                                        <textarea class="form-control {{ $errors->has('permanent_address') ? ' is-invalid' : '' }}" value="{{ $errors->has('permanent_address') ? '' : old('permanent_address') }}" name="permanent_address" placeholder="Permanent Address" id="permanent_address">{{ $errors->has('permanent_address') ? '' : old('permanent_address') }}</textarea>
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
                                        <textarea class="form-control {{ $errors->has('local_address') ? ' is-invalid' : '' }}" value="{{ $errors->has('local_address') ? '' : old('local_address') }}" name="local_address" placeholder="Local Address" id="local_address">{{ $errors->has('local_address') ? '' : old('local_address') }}</textarea>
                                    </div>
									 @if ($errors->has('local_address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('local_address') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="image"> Image</label>
								<small style="display: inline-block; margin-left: 10px">(Only jpeg, jpg and png extensions are allowed!)</small><br><br>

								 <div class="row">
    								<div class="col-xs-12 col-md-12">
      									<div class="col-md-12 col-lg-12 col-xs-12" id="columns">
        									<div id="uploads" style=""><!-- Upload Content --></div>
      									</div>
      									<div class="clearfix"></div>
<!--      									<button class="btn btn-danger btn-lg pull-left" id="reset" type="button"><i class="fa fa-refresh"></i> &nbsp;Clear</button>-->
    								</div>
  								</div>
													
								<script>
									
									$('#myform').submit(function(e) {
										console.log($('#hidden_0').val());
										//e.preventDefault(e);
									})
									uploadHBR.init({
										"target": "#uploads",
										"textNew": "<center>ADD</center>",
										"max": 1,
									});
	
//									$('#reset').click(function () {
//										uploadHBR.reset('#uploads');
//									});
								</script>
													
								<label for="remarks">Remarks</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control {{ $errors->has('remarks') ? ' is-invalid' : '' }}" value="{{ $errors->has('remarks') ? '' : old('remarks') }}" name="remarks" placeholder="Remarks" id="remarks">{{ $errors->has('remarks') ? '' : old('remarks') }}</textarea>
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
									
								</script>
								
                                <br>
                           </fieldset>
											
										<a class="btn btn-primary" onclick="myStepper.next()"><i class="fa fa-mail-forward"></i> Next</a>
    									</div>
    									<div id="test-l-2" class="content">
<!--      										<p class="text-center">test 2</p>-->
											<br>
												
												<fieldset>
									
									<label for="designation"> Designation</label>
									 <div class="form-group">
										<div class="form-line">
											 <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{ $errors->has('designation') ? '' : old('designation') }}" id="designation">
										</div>
										 @if ($errors->has('designation'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('designation') }}
										</span>
										@endif
									</div>

									<label for="emp_type"> Type of Employee</label>
									<div class="form-group">
										<div class="form-line">
										   <select class="form-control {{ $errors->has('emp_type') ? ' is-invalid' : '' }}" name="emp_type" id="emp_type">
												<option value="">---Select the type of employee---</option>
												@foreach($emp_type as $emp)
												{	
													<option value="{{$emp->emp_type_id}}">{{$emp->emp_type}}</option>
												}
												@endforeach
											</select>
										</div>
										 @if ($errors->has('emp_type'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('emp_type') }}
										</span>
										@endif
									</div>	
									<script>
										
										$('#emp_type').on('change', function(){
//											$(this).selectpicker('refresh');
											var type=$(this).val();
											console.log(type);
											if(type == '1')
											{
												$('#training_period').attr('disabled', true);
												$('#training_end_date').attr('disabled', true);
												$('#training_period').selectpicker('refresh');
											}
											else
											{
												$('#training_period').removeAttr("disabled", "disabled");
												$('#training_end_date').removeAttr("disabled", "disabled");
												$('#training_period').selectpicker('refresh');
											}
										})
										
										
										//var d = new Date();
										//var strDate = (d.getFullYear()-18) + "/" + (d.getMonth()) + "/" + d.getDate();
										
										$('#dob').bootstrapMaterialDatePicker({time: false, maxDate: moment().subtract(18, 'years'), format: 'dddd DD MMMM YYYY', clearButton: true});
									</script>

									<label for="joining_date"> Joining Date</label>
									 <div class="form-group">
										<div class="form-line">
											 <input type="text" class="datepicker form-control" placeholder="Please select joining date of this employee." name="joining_date" value="{{ $errors->has('joining_date') ? '' : old('joining_date') }}" id="joining_date">
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
											<input type="text" class="form-control {{ $errors->has('bond_period') ? ' is-invalid' : '' }}" name="bond_period" placeholder="Bond Period" value="{{ $errors->has('bond_period') ? '' : old('bond_period') }}" id="bond_period">
										</div>
										 @if ($errors->has('bond_period'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('bond_period') }}
										</span>
										@endif
									</div>

									<label for="training_period"> Training Period</label>
									<div class="form-group">
										<div class="form-line">
										<select class="form-control {{ $errors->has('training_period') ? ' is-invalid' : '' }}" name="training_period" id="training_period">
												<option value="">---Select training period---</option>	
												@foreach($period as $per)
													<option value="{{ $per->id }}">{{ $per->period }} months</option>
												@endforeach
										</select>
										</div>
										 @if ($errors->has('training_period'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('training_period') }}
										</span>
										@endif              
									</div>

									<label for="probation_period"> Probation Period</label>
									<div class="form-group">
										<div class="form-line">
											<select class="form-control {{ $errors->has('probation_period') ? ' is-invalid' : '' }}" name="probation_period" id="probation_period">
												<option value="">---Select probation period---</option>	
												@foreach($period as $per)
													<option value="{{ $per->id }}">{{ $per->period }} months</option>
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
											 <input type="text" class="datepicker form-control" placeholder="Please select probabtion end date of this employee." name="probation_end_date" value="{{ $errors->has('probation_end_date') ? '' : old('probation_end_date') }}" id="probation_end_date">
										</div>
										 @if ($errors->has('probation_end_date'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('probation_end_date') }}
										</span>
										@endif
									</div></div>

									<div><label for="training_end_date"> Training End Date</label>
									 <div class="form-group">
										<div class="form-line">
											 <input type="text" class="datepicker form-control" placeholder="Please select training end date of this employee." name="training_end_date" value="{{ $errors->has('training_end_date') ? '' : old('training_end_date') }}" id="training_end_date">
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
											 <input type="text" class="datepicker form-control" placeholder="Please select bond end date of this employee." name="bond_end_date" value="{{ $errors->has('bond_end_date') ? '' : old('bond_end_date') }}" id="bond_end_date">
										</div>
										 @if ($errors->has('bond_end_date'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('bond_end_date') }}
										</span>
										@endif
									</div></div>

									<label for="salary"> Salary</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control {{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" placeholder="Salary" value="{{ $errors->has('salary') ? '' : old('salary') }}" id="salary">
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
											 <input type="text" class="datepicker form-control" placeholder="Please select confirmation date of this employee." name="confirmation_date" value="{{ $errors->has('confirmation_date') ? '' : old('confirmation_date') }}" id="confirmation_date">
										</div>
										 @if ($errors->has('confirmation_date'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('confirmation_date') }}
										</span>
										@endif
									</div></div>

							   </fieldset>
											
											<a class="btn btn-primary" onclick="myStepper.previous()"><i class="fa fa-mail-reply"></i> Previous</a>
      										<button type="submit" class="btn btn-primary" style="float: right"><i class="fa fa-plus"></i> Add</button>
    									</div>
  									</div>
								</div>
								<script>
								$(document).ready(function () {
										myStepper = new Stepper(document.querySelector('#stepper-example'),{
  										animation: true, linear: false
									})
									
									$('.mobile-phone-number').inputmask('+99 (999) 999-99-99', { placeholder: '+__ (___) ___-__-__' });
								})
								</script>
							</form>
							
                        </div>
                       </div>
				
            </div>
	</div>
</div>

</section>