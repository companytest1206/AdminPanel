@extends('layouts.app')
<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
@include('includes.topbar')
<section>
   <!-- Left Sidebar -->
        @include('includes.leftsidebar')
   <!-- #END# Left Sidebar -->
	
   <!-- Right Sidebar -->
        @include('includes.rightsidebar')
   <!-- #END# Right Sidebar -->
</section>
<section class="content">
	@if(Request::path() === 'invoice')
          <div class="card" style="margin-top: 15px; margin-left: 200px; width: 900px;">
			 <div class="header bg-blue">
				 	<h1 style="display: inline-block; color: azure;"><b>Admin</b>Panel</h1>
			  </div>
				
            <div class="body" style="margin-left: 10px;">
					  
   			<div style="float: left; margin-left: 100px;">
				From:<br>
				<strong>{{$admin->name}} (Admin)</strong><br>
				{{$admin->address}}<br>
				{{$admin->phone}}<br>
				{{$admin->email}}<br><br>
		   	</div>
				
			<div style="margin-left: 100px; display: inline-block">
				To:<br>
				<strong>{{$customer[0]->name}}</strong><br>
				{{$customer[0]->address}}<br>
				{{$customer[0]->phone}}<br>
				{{$customer[0]->email}}<br><br>
		   </div>
				
			<div style="float: right; margin-right: 150px;">
				<strong>Invoice: {{$id}}</strong><br>
				Date: @php 
					$mytime = Carbon\Carbon::now();
					echo $mytime->day.'/'.$mytime->month.'/'.$mytime->year;;
				@endphp<br>
				Due Date: @php 
					$mydate = Carbon\Carbon::now();
					echo date("d/m/y", strtotime("$mydate +10 days"))
				@endphp<br><br><br>
		   </div>
				<br>	  
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
					@php $i = 0; @endphp
					@for($k = 0; $k < count($request->product_name); $k++)
					<tr class="tabRow" id="item1">
					<td class="sno" id="sno">{{++$i}}</td>
					
						<td>{{$request->product_name[$k]}}</td>
						<td>{{$request->product_description[$k]}}</td>
						<td>{{$request->product_qty[$k]}}</td>
					@if(is_numeric($request->tax[$k]))
						<td>{{$request->tax[$k]}}</td>
					@else
						<td>-</td>
					@endif
						<td><i class="fa fa-inr"></i>&nbsp;&nbsp;{{$request->price[$k]}}</td>
						<td><i class="fa fa-inr"></i>&nbsp;&nbsp;{{$request->subtotal[$k]}}</td>
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
								<td>{{$request->total}} <i class="fa fa-inr"></i></td>
							</tr>
							<tr>
								<th>Tax (10%)</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 10; $total = $request->total; $tax = ($per / 100) * $total; echo $tax; @endphp</td>
							</tr>
							<tr>
								<th>Shipping(5%):</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 5; $total = $request->total; $ship = ($per / 100) * $total; echo $ship; @endphp</td>
							</tr>
							<tr>
								<th>Grand Total:</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 5; $total = $request->total; $ship = ($per / 100) * $total; echo ($total + $ship); @endphp</td>
							</tr>
						</table>
					</div>
				</div>
	  
				<div class="row no-print">
					<div class="col-xs-12">
						<a href="/printinvoice/{{$id}}" target="_blank" class="btn btn-default" style="margin-left: 15px;"><i class="fa fa-print"></i> Print</a>
						<a href="/sendemail/{{$customer[0]->email}}/{{$id}}" class="btn btn-default" style="margin-left: 15px;"><i class="fa fa-envelope"></i> Send Email</a>
						<button type="button" class="btn btn-success pull-right" style="margin-right: 20px;"><i class="fa fa-credit-card"></i> Submit Payment
						</button>
						<a href="{{ route('generate-pdf',['download'=>'pdf', 'id'=>$id]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
							<i class="fa fa-download"></i> Download PDF
						</a>
						<a href="{{ route('generate-pdf',['view'=>'pdf', 'id'=>$id]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
							<i class="fa fa-eye"></i> View PDF
						</a>
					</div>
				</div>
        		<br>
  </div>
  </div>
	@endif
	
	@if(Request::path() === 'searchinvoice')
          <div class="card" style="margin-top: 15px; margin-left: 200px; width: 900px;">
			 <div class="header bg-blue">
				 	<center><h1 style="display: inline-block; color: azure;">AdminPanel&nbsp;&nbsp;</h1></center>
			  </div>
<!--			  <img src="{{ asset('imgs/laravel.png') }}" height="30px" width="30px" class="img-circle" alt="logo" style="display: inline-block; margin-bottom: 5px;">-->
				
            <div class="body">
					  
   			<div style="float: left; margin-left: 80px;">
				From:<br>
				<strong>{{$admin->name}} (Admin)</strong><br>
				{{$admin->address}}<br>
				{{$admin->phone}}<br>
				{{$admin->email}}<br><br>
		   	</div>
			@foreach($invoice as $inv)	
			<div style="margin-left: 100px; display: inline-block">
				To:<br>
				<strong>{{$inv->name}}</strong><br>
				{{$inv->address}}<br>
				{{$inv->phone}}<br>
				{{$inv->email}}<br><br>
		   </div>
				
			<div style="float: right; margin-right: 120px;">
				<strong>Invoice: {{$inv->inv_id}}</strong><br>
				Date: @php 
					$mytime = Carbon\Carbon::now();
					echo $mytime->day.'/'.$mytime->month.'/'.$mytime->year;;
				@endphp<br>
				Due Date: @php 
					$mydate = Carbon\Carbon::now();
					echo date("d/m/y", strtotime("$mydate +10 days"))
				@endphp<br><br><br>
		   </div>
				<br>	  
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
					$pn = explode(",", $inv->prod_name);
					$pq = explode(",", $inv->prod_qty);
					$pp = explode(",", $inv->prod_price);
					$pd = explode(",", $inv->prod_description);
					if(is_numeric($inv->tax))
					{
						$tax = $inv->tax ? explode(",", $inv->tax) : '';
					}
					else
					{
						$tax = '';
					}
					$subt = explode(",", $inv->sub_total);
					$t = explode(",", $inv->total);
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
						<td><i class="fa fa-inr" style="margin-left: 20px"></i>&nbsp;&nbsp;{{$pp[$k]}}</td>
						<td><i class="fa fa-inr" style="margin-left: 20px"></i>&nbsp;&nbsp;{{$subt[$k]}}</td>
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
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;{{$inv->total}}</td>
							</tr>
							<tr>
								<th>Tax (10%)</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 10; $total = $inv->total; $tax = ($per / 100) * $total; echo $tax; @endphp</td>
							</tr>
							<tr>
								<th>Shipping(5%):</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 5; $total = $inv->total; $ship = ($per / 100) * $total; echo $ship; @endphp</td>
							</tr>
							<tr>
								<th>Grand Total:</th>
								<td><i class="fa fa-inr"></i>&nbsp;&nbsp;@php $per = 5; $total = $inv->total; $ship = ($per / 100) * $total; echo ($total + $ship); @endphp</td>
							</tr>
						</table>
					</div>
				</div>
	  			@endforeach
				<div class="row no-print">
					<div class="col-xs-12">
						<a href="/printinvoice/{{$inv->inv_id}}" target="_blank" class="btn bg-blue-grey" style="margin-left: 15px;"><i class="fa fa-print" style="margin-bottom: 5px"></i> Print</a>
						<a href="/sendemail/{{$inv->email}}/{{$inv->inv_id}}" class="btn bg-blue-grey" style="margin-left: 15px;"><i class="fa fa-envelope" style="margin-bottom: 5px"></i> Send Email</a>
<!--
						<button type="button" class="btn btn-success pull-right" style="margin-right: 20px;"><i class="fa fa-credit-card"></i> Submit Payment
						</button>
-->
						<a href="{{ route('generate-pdf',['download'=>'pdf', 'id'=>$inv->inv_id]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
							<i class="fa fa-download"></i> Download PDF
						</a>
						<a href="{{ route('generate-pdf',['view'=>'pdf', 'id'=>$inv->inv_id]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
							<i class="fa fa-eye"></i> View PDF
						</a>
					</div>
				</div>
        		<br>
  </div>
  </div>
	@endif
    </section>