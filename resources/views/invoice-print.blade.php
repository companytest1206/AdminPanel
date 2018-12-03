<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>
	
    <script src="{{ asset('js/pages/examples/sign-in.js') }}"></script>
	
	<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>-->

</head>
    <!-- Main content -->
	<body onLoad="window.print();">
     <div class="content">   
          <div class="card" style="margin-top: 15px; width: 900px; height: 700px">
			 <div class="header " style="background-color: #2196F3">
				 	<center><h1 style="display: inline-block; color: azure;"><b>Admin</b>Panel&nbsp;&nbsp;</h1></center>
			  </div>
			<!--				<img src="{{ asset('imgs/laravel.png') }}" height="30px" width="30px" class="img-circle" alt="logo" style="display: inline-block;">-->	
            <div class="body" style="margin-left: 10px;">
					  
   			<div style="float: left; margin-left: 80px;">
				From:<br>
				<strong>{{$admin->name}}</strong><br>
				{{$admin->address}}<br>
				{{$admin->phone}}<br>
				{{$admin->email}}<br><br>
		   	</div>
				
			<div style="margin-left: 100px; display: inline-block">
				To:<br>
				<strong>{{$customer->name}}</strong><br>
				{{$customer->address}}<br>
				{{$customer->phone}}<br>
				{{$customer->email}}<br><br>
		   </div>
				
			<div style="float: right; margin-right: 120px;">
				<strong>Invoice: {{$invoice->inv_id}}</strong><br>
				Date: @php 
					$mytime = Carbon\Carbon::now();
					echo $mytime->day.'/'.$mytime->month.'/'.$mytime->year;;
				@endphp<br>
				Due Date: @php 
					$mydate = Carbon\Carbon::now();
					echo date("d/m/y", strtotime("$mydate +10 days"))
				@endphp<br><br><br>
		   </div>
				<br><br>	  
				<table class="table table-bordered add" id="mytable">
				<thead>
					<tr>
						<th>Sr No.</th>
						<th>Product Name</th>
						<th>Product Description</th>
						<th>Product Qty</th>
						<th>Product Tax</th>
						<th>Product Price</th>
						<th>Product Sub-total</th>
					</tr>
				</thead>
				<tbody>
					@php $i = 0; 
					$pn = explode(",", $invoice->prod_name);
					$pq = explode(",", $invoice->prod_qty);
					$pp = explode(",", $invoice->prod_price);
					$pd = explode(",", $invoice->prod_description);
					if(is_numeric($invoice->tax))
					{
						$tax = $invoice->tax ? explode(",", $invoice->tax) : '';
					}
					else
					{
						$tax = '';
					}
					$subt = explode(",", $invoice->sub_total);
					$t = explode(",", $invoice->total);
					@endphp
					@for($k = 0; $k < count($pn); $k++)
					<tr class="tabRow" id="item1">
					<td class="sno" id="sno">{{++$i}}</td>
					
						<td>{{$pn[$k]}}</td>
						<td>{{$pd[$k]}}</td>
						<td>{{$pq[$k]}}</td>
					@if($tax != '')
						<td>{{$tax[$k]}}</td>
					@else
						<td>-</td>
					@endif
						<td><i class="fa fa-inr"></i>&nbsp;&nbsp;{{$pp[$k]}}</td>
						<td><i class="fa fa-inr"></i>&nbsp;&nbsp;{{$subt[$k]}}</td>
					</tr>
					@endfor
				</tbody>
				</table>
				<br><br>
				
				<div class="col-xs-6">
    	     	 <p class="lead">Payment Methods:</p>
     	   	  	 <img src="{{asset('imgs/credit/visa.png')}}" alt="Visa">
     	    	 <img src="{{asset('imgs/credit/mastercard.png')}}" alt="Mastercard">
     	     	 <img src="{{asset('imgs/credit/mestro.png')}}" alt="Maestro">
          		 <img src="{{asset('imgs/credit/paypal2.png')}}" alt="Paypal">
	
					<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
						You can use any the above methods for payment. Please make all checks payable to <b>Admin</b>Panel. Payment should be done in 10 days. If you have any questions concerning this invoice, feel free to contact: {{ $admin->name }}, {{ $admin->phone }}, {{ $admin->email }}.
					</p>
				</div>
				
				<div class="col-xs-6">
					<p class="lead">Amount Due: @php 
					$mydate = Carbon\Carbon::now();
					echo date("d/m/y", strtotime("$mydate +10 days"));
				@endphp</p>

					<div class="table-responsive">
						<table class="table">
							<tr>
								<th style="width:50%">Total(Sub-total):</th>
								<td>{{$invoice->total}} <i class="fa fa-inr"></i></td>
							</tr>
							<tr>
								<th>Tax (10%)</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 10; $total = $invoice->total; $tax = ($per / 100) * $total; echo $tax; @endphp</td>
							</tr>
							<tr>
								<th>Shipping(5%):</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 5; $total = $invoice->total; $ship = ($per / 100) * $total; echo $ship; @endphp</td>
							</tr>
							<tr>
								<th>Grand Total:</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 5; $total = $invoice->total; $ship = ($per / 100) * $total; echo ($total + $ship); @endphp </td>
							</tr>
						</table>
					</div>
				</div>
	  
				
  			</div>
  		</div>
      </div>

  </body>

</html>
