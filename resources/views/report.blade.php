@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

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
    <li class="active"><i class="material-icons">person</i> Employees</li>
</ol>
<section class="content">
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
                 <div class="card">
                        <div class="header bg-blue">
                            <h2 style="display: inline-block">
                               Search Employee Salary Report here: &nbsp;
                            </h2>
                        </div>
					<div class="body">
							
						<label for="emp_name">Name of Employee</label>
							<div class="form-group">
							<div class="form-line">
								<select class="form-control {{ $errors->has('emp_name') ? ' is-invalid' : '' }}" name="emp_name" id="emp_name">
									<option value="">---All---</option>
										@foreach($employee as $emp)
										{	
											<option value="{{$emp['emp_id']}}">{{$emp['name']}}</option>
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
						
						<label for="month">Month </label>
							<div class="form-group">
								<div class="form-line">
									<select class="form-control {{ $errors->has('month') ? ' is-invalid' : '' }}" name="month" id="month">
											@foreach($months as $month)
											{	
												<option value="{{$month['cid']}}" @if ($month['month'] == date('F Y'))
        										selected="selected"
    											@endif>{{$month['month']}}</option>
											}
											@endforeach
									</select>
								</div>
								@if ($errors->has('month'))
									<span class="invalid-feedback" role="alert" style="color: red;">
										{{ $errors->first('month') }}
									</span>
								@endif
							</div>
					</div>	
				</div>	
					
				<script>
					$('#month').on('change', function(event) {
						var emp = $('#emp_name').val();
						var x = $(this).val();
							//console.log(x);
							//console.log(emp);
							$.get("{{ url('api/salaryDetails')}}", 
								  { id: x,
								  	emp_id: emp}, 
								  function(data) {
								if($.isEmptyObject(data))
								{
									$('table#emp_sal_details tr#str').remove();
									$('table#emp_super_sal_details tr#sstr').remove();
									var td= '<tr><td colspan="9"><center>No Records found!</center></td></tr>';
									var std= '<tr><td colspan="17"><center>No Records found!</center></td></tr>';
									$('table#emp_sal_details').append(td);
									$('table#emp_super_sal_details').append(std);
								}
								$.each(data, function(index, element) {
									var i = 0;
									if(element.sal_id)
									{
										$('table#emp_super_sal_details tr#sstr').remove();
										$('table#emp_sal_details tr#str').find('td').text('');
										var std= '<tr><td colspan="17"><center>No Records found!</center></td></tr>';
										$('table#emp_super_sal_details').append(std);
										var rowCount = $('table#emp_sal_details tr').length;
										if(rowCount > 1)
										{
											 //$("table#emp_sal_details").find("tr:gt(1)").remove();
											$("table#emp_sal_details tr#str").slice(1).remove();
										}
										$('#srno').text(++i);
										$('#name').text(element.name);
										$('#bs').text(element.basic_sal);
										$('#pt').text(element.prof_tax);
										$('#l').text(element.leave_DHM);
										if(element.leave_DHM == null){ element.leave_DHM = '-'; }
										if(element.adv_paid == null){ element.adv_paid = '-'; }
										if(element.sal_encash == null){ element.sal_encash = '-'; }
										if(element.tds_deduct == null){ element.tds_deduct = '-'; }
										if(element.pay_sal == null){ element.pay_sal = '-'; }
										$('#ap').text(element.adv_paid);
										$('#se').text(element.sal_encash);
										$('#td').text(element.tds_deduct);
										$('#ps').text(element.pay_sal);
									}
									if(element.sup_sal_id)
									{
										$('table#emp_sal_details tr#str').remove();
										$('table#emp_super_sal_details tr#sstr').find('td').text('');
										var td= '<tr><td colspan="9"><center>No Records found!</center></td></tr>';
										$('table#emp_sal_details').append(td);
										var rowCount = $('table#emp_super_sal_details tr').length;
										if(rowCount > 1)
										{
											 //$("table#emp_sal_details").find("tr:gt(1)").remove();
											$("table#emp_super_sal_details tr#sstr").slice(1).remove();
										}
										$('#srno').text(++i);
										$('#sname').text(element.name);
										$('#sbwk').text(element.work_days_before_change);
										$('#sbmm').text(element.old_basic_salary);
										$('#sobs').text(element.old_basic_salary);
										$('#sbl').text(element.before_change_leave_DHM);
										$('#sbps').text(element.before_change_pay_sal);
										$('#sawd').text(element.work_days_after_change +' days.');
										$('#samm').text(element.mins_month_after_change);
										$('#snbs').text(element.new_basic_salary);
										$('#spt').text(element.profession_tax);
										$('#sal').text(element.after_change_leave_DHM);
										if(element.before_change_leave_DHM == null){ element.before_change_leave_DHM = '-'; }
										if(element.after_change_leave_DHM == null){ element.after_change_leave_DHM = '-'; }
										if(element.profession_tax == null){ element.profession_tax = '-'; }
										if(element.adv_paid == null){ element.adv_paid = '-'; }
										if(element.sal_encash == null){ element.sal_encash = '-'; }
										if(element.tds_deduct == null){ element.tds_deduct = '-'; }
										$('#sap').text(element.adv_paid);
										$('#sse').text(element.sal_encash);
										$('#std').text(element.tds_deduct);
										$('#saps').text(element.after_change_pay_sal);
										$('#sfps').text(element.final_pay_sal);
									}
								});
							});
						});			
					
				</script>
					
					<br>	
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2 style="display: inline-block">
                               Employee Salary Report: (Simple Salary details of employee is here)
                            </h2>
                        </div>
						<div class="body">
                            <div class="table-responsive">
								@php
									$i = 0;
								@endphp
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" align="center" id="emp_sal_details">
                                    <thead>
                                        <tr>
											<th><center>Sr.No</center></th>
                                            <th><center>Employee Name</center></th>
                                            <th><center>Basic Salary</center></th>
                                            <th><center>Profession Tax(Rs.)</center></th>
                                            <th><center>Leave Details</center></th>
                                            <th><center>Advance Paid</center></th>
                                            <th><center>Salary Encashment</center></th>
                                            <th><center>TDS Deduction</center></th>
                                            <th><center>Payable Salary</center></th>
                                        </tr>
                                    </thead>
									<tbody>
										@if($sal_details === [])
				 						<tr><td colspan="6"><center>No Records Found!</center></td></tr>
										@else
										@foreach($sal_details as $details)
                                        <tr class="table-tr" data-url="" style="cursor: pointer;" id="str">
											<td align="center" id="srno">{{ ++$i }}</td>
                                            <td align="center" id="name">{{ $details->name }}</td>
                                            <td align="center" id="bs">{{ $details->basic_sal }}</td>
                                            <td align="center" id="pt">{{ $details->prof_tax }}</td>
											<td align="center" id="l"> @if($details->leave_DHM == '') - @else {{ $details->leave_DHM }} @endif</td>
											<td align="center" id="ap">	@if($details->adv_paid == '') - @else {{ $details->adv_paid }} @endif</td>
											<td align="center" id="se">	@if($details->sal_encash == '') - @else {{ $details->sal_encash }} @endif</td>
											<td align="center" id="td">	@if($details->tds_deduct == '') - @else {{ $details->tds_deduct }} @endif</td>
											<td align="center" id="ps">{{ $details->pay_sal }}</td>
                                        </tr>
										@endforeach
				  						@endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
											<th><center>Sr.No</center></th>
                                            <th><center>Employee Name</center></th>
                                            <th><center>Basic Salary</center></th>
                                            <th><center>Profession Tax(Rs.)</center></th>
                                            <th><center>Leave Details</center></th>
                                            <th><center>Advance Paid</center></th>
                                            <th><center>Salary Encashment</center></th>
                                            <th><center>TDS Deduction</center></th>
                                            <th><center>Payable Salary</center></th>
                                        </tr>
                                    </tfoot>

                                </table>
								
								<script>
									$(function() {
										$('table#employees').on("click", "tr.table-tr", function() {
											window.location = $(this).data("url");
										});
									});
								</script>
                            </div>
                        </div>
              		</div>
					
					<br>
					<div class="card">
                        <div class="header bg-blue-grey">
                            <h2 style="display: inline-block">
                               Employee Salary Report: (Super Calculation for Salary details of employee having scale change or stipend change is here)
                            </h2>
                        </div>
						<div class="body">
                            <div class="table-responsive">
								@php
									$i = 0;
								@endphp
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" align="center" id="emp_super_sal_details" width="2000px">
                                    <thead>
                                        <tr>
											<th><center>Sr.No</center></th>
                                            <th><center>Employee Name</center></th>
                                            <th><center>Working Days(Before Period Change)</center></th>
											<th><center>Working Minutes(Before Period Change)</center></th>
                                            <th><center>Old Basic Salary</center></th>
                                            <th><center>Leave Details(Before Period Change)</center></th>
                                            <th><center>Payable Salary(Before Period Change)</center></th>
                                            <th><center>Working Days(After Period Change)</center></th>
                                            <th><center>Working Minutes(After Period Change)</center></th>
                                            <th><center>New Basic Salary</center></th>
                                            <th><center>Profession Tax(Rs.)</center></th>
                                            <th><center>Leave Details(After Period Change)</center></th>
                                            <th><center>Advance Paid</center></th>
                                            <th><center>Salary Encashment</center></th>
                                            <th><center>TDS Deduction</center></th>
                                            <th><center>Payable Salary(After Period Change)</center></th>
                                            <th><center>Final Payable Salary</center></th>
                                        </tr>
                                    </thead>
									<tbody>
										@if($super_sal_details === [])
				 						<tr><td colspan="6"><center>No Records Found!</center></td></tr>
										@else
										@foreach($super_sal_details as $details)
                                        <tr class="table-tr" data-url="" style="cursor: pointer;" id="sstr">
											<td align="center" id="srno">{{ ++$i }}</td>
                                            <td align="center" id="sname">{{ $details->name }}</td>
                                            <td align="center" id="sbwk">{{ $details->work_days_before_change }}</td>
                                            <td align="center" id="sbmm">{{ $details->mins_month_before_change }}</td>
											<td align="center" id="sobs">{{ $details->old_basic_salary}}</td>
											<td align="center" id="sbl">{{ $details->before_change_leave_DHM }}</td>
											<td align="center" id="sbps">{{ $details->before_change_pay_sal }}</td>
											<td align="center" id="sawd">{{ $details->work_days_after_change.' days.' }}</td>
											<td align="center" id="samm">{{ $details->mins_month_after_change }}</td>
                                            <td align="center" id="snbs">{{ $details->new_basic_salary }}</td>
                                       		<td align="center" id="spt">@if($details->profession_tax == '') - @else {{ $details->profession_tax }} @endif</td>
                                       		<td align="center" id="sal">@if($details->after_change_leave_DHM == '') - @else {{ $details->after_change_leave_DHM }} @endif</td>
                                       		<td align="center" id="sap">@if($details->adv_paid == '') - @else {{ $details->adv_paid }} @endif</td>
                                       		<td align="center" id="sse">@if($details->sal_encash == '') - @else {{ $details->sal_encash }} @endif</td>
                                       		<td align="center" id="std">@if($details->tds_deduct == '') - @else {{ $details->tds_deduct }} @endif</td>
                                            <td align="center" id="saps">{{ $details->after_change_pay_sal }}</td>
                                            <td align="center" id="sfps">{{ $details->final_pay_sal }}</td>
                                        </tr>
										@endforeach
				  						@endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
											<th><center>Sr.No</center></th>
                                            <th><center>Employee Name</center></th>
                                            <th><center>Working Days(Before Period Change)</center></th>
											<th><center>Working Minutes(Before Period Change)</center></th>
                                            <th><center>Old Basic Salary</center></th>
                                            <th><center>Leave Details(Before Period Change)</center></th>
                                            <th><center>Payable Salary(Before Period Change)</center></th>
                                            <th><center>Working Days(After Period Change)</center></th>
                                            <th><center>Working Minutes(After Period Change)</center></th>
                                            <th><center>New Basic Salary</center></th>
                                            <th><center>Profession Tax(Rs.)</center></th>
                                            <th><center>Leave Details(After Period Change)</center></th>
                                            <th><center>Advance Paid</center></th>
                                            <th><center>Salary Encashment</center></th>
                                            <th><center>TDS Deduction</center></th>
                                            <th><center>Payable Salary(After Period Change)</center></th>
                                            <th><center>Final Payable Salary</center></th>
                                        </tr>
                                    </tfoot>

                                </table>
								
								<script>
									$(function() {
										$('table#employees').on("click", "tr.table-tr", function() {
											window.location = $(this).data("url");
										});
									});
								</script>
                            </div>
                        </div>
              		</div>
					
					<br>
					
            	</div>
          </div>
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  			    @if(Session::has('alert-' . $msg))
					<script>
						$(document).ready( function() {

							var colorName = "bg-black";
							var text = "{{ Session::get('alert-' . $msg) }}";
							var placementFrom = "bottom";
							var placementAlign = "center";
							var animateEnter = "";
							var animateExit = "";
														
							showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit);
						});	
					</script>
				@endif
   		@endforeach
</section>
