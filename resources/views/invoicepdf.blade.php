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

    <!-- Morris Chart Css-->
    <link href="{{ asset('plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
	
	<!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/index.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('js/demo.js') }}"></script>
	</head>
    <body class="theme-indigo">
        <div class="card">
			 <div class="header bg-blue" style="height: 100px;">
				 	<center><h1 style="color: azure; margin-bottom: 20px;"><b>Admin</b>Panel&nbsp;&nbsp;</h1></center>
			  </div>
<!--			<img src="{{ public_path('imgs/laravel.png') }}" height="30px" width="30px" alt="logo" style="border-radius: 15px; margin-bottom: 10px;">	-->
            <div class="body" style="margin-left: 10px;">
					  
   			<div style="margin-left: 30px;">
			<div style="float: left">
				From:<br>
				<strong>{{$admin->name}}</strong><br>
				{{$admin->address}}<br>
				{{$admin->phone}}<br>
				{{$admin->email}}<br><br>
			</div>
				
		   	<div style="display: inline-block; margin-left: 170px;">
				To:<br>
				<strong>{{$customer->name}}</strong><br>
				{{$customer->address}}<br>
				{{$customer->phone}}<br>
				{{$customer->email}}<br><br>
			</div>
				
		   <div style="float: right; margin-right: 60px;">
				<strong>Invoice: {{$invoice->inv_id}}</strong><br>
				Date: @php 
					$mytime = Carbon\Carbon::now();
					echo $mytime->day.'/'.$mytime->month.'/'.$mytime->year;;
				@endphp<br>
				Due Date: @php 
					$mydate = Carbon\Carbon::now();
					echo date("d/m/y", strtotime("$mydate +10 days"))
				@endphp<br>
			</div>
		   </div>
				<table class="table table-bordered" id="mytable">
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
				<br>
				
				<div class="col-xs-6">
    	     	 <p class="lead">Payment Methods:</p>
     	   	  	 <img src="{{public_path('imgs/credit/visa.png')}}" alt="Visa">
     	    	 <img src="{{public_path('imgs/credit/mastercard.png')}}" alt="Mastercard">
     	     	 <img src="{{public_path('imgs/credit/mestro.png')}}" alt="Maestro">
          		 <img src="{{public_path('imgs/credit/paypal2.png')}}" alt="Paypal">
	
					<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
						You can use any the above methods for payment. Please make all checks payable to <b>Admin</b>Panel. Payment should be done in 10 days. If you have any questions concerning this invoice, feel free to contact: {{ $admin->name }}, {{ $admin->phone }}, {{ $admin->email }}.
					</p>
				</div>
				<br>
				<div class="col-xs-6">
					<p class="lead">Amount Due: @php 
					$mydate = Carbon\Carbon::now();
					echo date("d/m/y", strtotime("$mydate +10 days"));
				@endphp</p>

					<div class="table-responsive" style="width: 70%; margin-left: 10px; margin-top: 20px;">
						<table class="table">
							<tr>
								<th style="width:50%">Total(Sub-total):</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;{{$invoice->total}}</td>
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
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 5; $total = $invoice->total; $ship = ($per / 100) * $total; echo ($total + $ship); @endphp</td>
							</tr>
						</table>
					</div>
				</div>
	  
				
        		<br>
  </div>
      
		</div>
    </body>
</html>