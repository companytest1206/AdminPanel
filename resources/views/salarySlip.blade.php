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
    <li><a href="/home"><i class="material-icons">content_paste</i> Generate Salary Slip</a></li>
    <li class="active"><i class="material-icons">receipt</i> Salary Slip</li>
</ol>
<section class="content">
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
							<h3 class="box-title">
								<h1><center>{{$data->company_name}}</center></h1>
								<small><center>{{$data->address}}</center></small>
								<h5><center>Salary Slip</center></h5>  
							</h3>
                        </div>
                        <div class="box-body">
							<div style="margin-left: 100px; margin-top: 20px">
            					<label>Employee Name:</label> &nbsp;&nbsp;{{$data->emp_name}}<br>
            					<label>Designation:</label> &nbsp;&nbsp;{{$data->emp_designation}}<br>
            					<label>Month/Year:</label> &nbsp;&nbsp;{{Carbon\Carbon::now()->toFormattedDateString() }}<br>
							</div>
							<br><center>
							<table border="1px solid black" width="80%">
			  				<tr>
								<th><strong><center>Earnings</center></strong></th>
								<th></th>
								<th><strong><center>Deductions</center></strong></th>
								<th></th>
			  				</tr>
			 				@foreach($details as $detail)
			  				<tr>
								<td align="center">Basic and DA</td>
								<td align="center">{{$detail->BasicAndDA}}</td>
								<td align="center">Provident Fund</td>
								<td align="center">{{$detail->ProvidentFund}}</td>
			  				</tr>
			  				<tr>
								<td align="center">HRA</td>
								<td align="center">{{$detail->HRA}}</td>
								<td align="center">E.S.I</td>
								<td align="center">{{$detail->ESI}}</td>
			  				</tr>
			  				<tr>
								<td align="center">Conveyance</td>
								<td align="center">{{$detail->Conveyance}}</td>
								<td align="center">Loan</td>
								<td align="center">{{$detail->Loan}}</td>
			  				</tr>
			  				<tr>
								<td></td>
								<td></td>
								<td align="center">Profession Tax</td>
								<td align="center">{{$detail->ProfessionTax}}</td>
			  				</tr>
			  				<tr>
								<td></td>
								<td></td>
								<td align="center">TSD/IT</td>
								<td align="center">{{$detail->TSD_IT}}</td>
			 			 	</tr>
			  				<tr>
								<td colspan="4">&nbsp;</td>
			  				</tr>
			  				<tr>
								<td align="center">Total Addition</td>
								<td align="center">{{$detail->BasicAndDA + $detail->HRA + $detail->Conveyance}}</td>
								<td align="center">Total Deduction</td>
								<td align="center">
								@if(!is_numeric($detail->Loan)) 
						 			@php $detail->Loan=(int)0; @endphp
								@endif
								@if(!is_numeric($detail->ProfessionTax))
									@php $detail->ProfessionTax=(int)0; @endphp
								@endif
								@if(!is_numeric($detail->TSD_IT))
									@php $detail->TSD_IT=(int)0; @endphp
								@endif
								{{$detail->ProvidentFund + $detail->ESI + $detail->Loan + $detail->ProfessionTax + $detail->TSD_IT}}
								</td>
			 		 		</tr>
			  				<tr>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center" rowspan="2"><strong>NET Salary</strong></td>
								<td align="center" rowspan="2">{{$detail->NetSalary}}</td>
			  				</tr>
			  				<tr>
							<td align="center">&nbsp;</td>
							<td align="center">&nbsp;</td>
			 			 	</tr>
				<div id="netsalary" hidden="hidden">{{$detail->NetSalary}}</div>
			@endforeach
			</table></center>
			<script>
				$(document).ready(function() {
				var amount = $('#netsalary').text();		
				console.log(amount);
				var words = new Array();
				words[0] = '';
				words[1] = 'One';
				words[2] = 'Two';
				words[3] = 'Three';
				words[4] = 'Four';
				words[5] = 'Five';
				words[6] = 'Six';
				words[7] = 'Seven';
				words[8] = 'Eight';
				words[9] = 'Nine';
				words[10] = 'Ten';
				words[11] = 'Eleven';
				words[12] = 'Twelve';
				words[13] = 'Thirteen';
				words[14] = 'Fourteen';
				words[15] = 'Fifteen';
				words[16] = 'Sixteen';
				words[17] = 'Seventeen';
				words[18] = 'Eighteen';
				words[19] = 'Nineteen';
				words[20] = 'Twenty';
				words[30] = 'Thirty';
				words[40] = 'Forty';
				words[50] = 'Fifty';
				words[60] = 'Sixty';
				words[70] = 'Seventy';
				words[80] = 'Eighty';
				words[90] = 'Ninety';
				amount = amount.toString();
				var atemp = amount.split(".");
				var number = atemp[0].split(",").join("");
				var n_length = number.length;
				var words_string = "";
				if (n_length <= 9) {
					var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
					var received_n_array = new Array();
					for (var i = 0; i < n_length; i++) {
						received_n_array[i] = number.substr(i, 1);
					}
					for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
						n_array[i] = received_n_array[j];
					}
					for (var i = 0, j = 1; i < 9; i++, j++) {
						if (i == 0 || i == 2 || i == 4 || i == 7) {
							if (n_array[i] == 1) {
								n_array[j] = 10 + parseInt(n_array[j]);
								n_array[i] = 0;
							}
						}
					}
					value = "";
					for (var i = 0; i < 9; i++) {
						if (i == 0 || i == 2 || i == 4 || i == 7) {
							value = n_array[i] * 10;
						} else {
							value = n_array[i];
						}
						if (value != 0) {
							words_string += words[value] + " ";
						}
						if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
							words_string += "Crores ";
						}
						if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
							words_string += "Lakhs ";
						}
						if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
							words_string += "Thousand ";
						}
						if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
							words_string += "Hundred and ";
						} else if (i == 6 && value != 0) {
							words_string += "Hundred ";
						}
					}
					words_string = words_string.split("  ").join(" ");
				}
				$('#value').text(words_string+ "Only");
				});
			</script>
			<br>
			<strong><div id="value" style="float: left; margin-left: 70px;"></div></strong><br>
			<div id="bank" style="float: right; margin-right: 70px;">Name of Bank: ____________________</div>
			<div id="cheque" style="display: inline-block; float:left; margin-left: 70px;">Cheque No: ____________________</div><br>
			<div id="date" style="display: inline-block; float: left; margin-left: 70px;">Date: <strong>{{Carbon\Carbon::now()->toDateString() }}</strong></div><br><br>
			<div id="signE" style="display: inline-block; float:left; margin-left: 70px;">Signature of the Employee: ____________________</div>  
			<div id="signD" style="float: right; margin-right: 40px;">Director: ____________________</div><br><br>
          </div>
                    </div>
                </div>
    </div>
        
</section>