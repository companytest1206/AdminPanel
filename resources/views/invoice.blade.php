@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
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
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
							
						<small><strong style="float: right;">Date:
						 @php 
						 	$mytime = Carbon\Carbon::now();
							echo $mytime->toDateString();
						 @endphp
						 </strong></small>
				 		<center><h1 style="display: inline-block">Add Invoice Details</h1></center>
							
                        </div>
                        <div class="body">
                            <form action="{{ url('/invoice') }}" method="post">
  							@csrf
					  
                                <label for="cust_name">Customer Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('cust_name') ? ' is-invalid' : '' }}" id="cust_name" name="cust_name" value="{{ $errors->has('cust_name') ? '' : old('cust_name') }}" placeholder="Customer name">
                                    </div>
									 @if ($errors->has('cust_name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('cust_name') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="address">Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ $errors->has('address') ? '' : old('address') }}" name="address" id="address" placeholder="Customer Address"></textarea>
                                    </div>
									 @if ($errors->has('address'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('address') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<table class="table table-bordered add" id="mytable">
								<thead>
								<tr>
									<th>Sr No.</th>
									<th>Product Name</th>
									<th>Product Qty</th>
									<th>Product Tax</th>
									<th>Product Description</th>
									<th>Product Price</th>
									<th>Product Sub-total</th>
									<th><a href="#" id="butVal" style="display: inline-block;"><i class="fa fa-plus"></i></a></th>
								</tr>
								</thead>
								<tbody>
								<tr class="tabRow" id="item">
									<td class="sno" id="sno">1</td>
									<td id="pname"><input type="text" class="form-control pname" id="product_name" name="product_name[]" value="" placeholder="Product name"></td>
									<td><input type="text" class="form-control" id="product_qty" name="product_qty[]" value="" placeholder="Prod. Qty" style="width: 120px; display: inline-block"></td>
									<td><input type="text" class="form-control" id="product_tax" name="product_tax[]" value="" placeholder="Prod. Tax" style="width: 120px; display: inline-block"></td>
									<td><input type="text" class="form-control" id="product_description" name="product_description[]" value="" placeholder="Product Description"></td>
									<td><i class="fa fa-inr" style="display: inline-block"></i>&nbsp;&nbsp;<input type="text" class="form-control" id="price" name="price[]" style="width: 60px; display: inline-block"></input></td>
									<td><i class="fa fa-inr" style="display: inline-block"></i>&nbsp;&nbsp;<input type="text" class="form-control" id="sub-total" name="subtotal[]" style="width: 60px; display: inline-block"></input></td>
									<td><a href="#" class="remove" style="display: inline-block; color: darkred;"><i class="fa fa-times"></i></a></td>
								</tr>
							</tbody>
							</table>
								
								<label for="total">Total</label>
                                <div class="form-group">
                                    <div class="form-line">
                                       <i class="fa fa-inr" style="display: inline-block"></i>&nbsp;&nbsp;<input type="text" class="form-control" id="total" name="total" style="width: 80px; display: inline-block"></input>
                                    </div>
									 @if ($errors->has('total'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('total') }}
     			 					</span>
     			 					@endif
                                </div>
								<br><br>
								@if ( $errors->count() > 0 )
									<div class="alert alert-error"><i class="fa fa-ban"></i><strong>&nbsp;&nbsp;Validation Errors</strong><br>
  				  					@foreach( $errors->all() as $message )
   				     					{{ $message }} <br>
   				 					@endforeach
									</div>
								@endif
								
								<script type="text/javascript">
					
									$(function(){
										var url = "{{ route('autocomplete.ajax') }}";
										var autocompleteOptions = {
											minLength: 3,
											source:  function (query, process) {
												console.log(query);
												return $.get(url, { query: query }, function (data) {
													console.log(data);
													return process(data);
												});
											}
										};
										
									var url = "{{ route('autocomplete.ajax') }}";
									
									
									
									
									
//									$('.pname').autocomplete({
//										source:  function (query, process) {
//											//console.log(query);
//											return $.get(url, { query: query }, function (data) {
//												//console.log(data);
//												return process(data);
//											});
//										}
//									});
									
								
										$('#butVal').click(function(e){
											e.preventDefault();
											var rowLen =  $('tr.tabRow').length;
											if(rowLen>9)
											{
												alert("no of row is reached 10");
											}
											else
											{
												//$("tr.tabRow:first").clone(true).appendTo("#mytable>tbody"); 
												//$("#mytable>tbody").append('<tr class="tabRow" id="item"><td class="sno" id="sno'+ rowLen +'"></td><td><input type="text" class="form-control pname" id="product_name'+ rowLen +'" name="product_name[]" value="" placeholder="Product name" autocomplete="off"></td><td><input type="text" class="form-control" id="product_qty'+ rowLen +'" name="product_qty[]" value="" placeholder="Prod. Qty" style="width: 80px; display: inline-block"></td><td><input type="text" class="form-control" id="product_tax'+ rowLen +'" name="product_tax[]" value="" placeholder="Prod. Tax" style="width: 80px; display: inline-block"></td><td><input type="text" class="form-control" id="product_description'+ rowLen +'" name="product_description[]" value="" placeholder="Product Description"></td><td><input type="text" class="form-control" id="price'+ rowLen +'" name="price[]" style="width: 60px; display: inline-block">&nbsp;&nbsp;<i class="fa fa-inr" style="display: inline-block"></i></input></td><td><input type="text" class="form-control" id="sub-total'+ rowLen +'" name="subtotal[]" style="width: 60px; display: inline-block">&nbsp;&nbsp;<i class="fa fa-inr" style="display: inline-block"></i></input></td><td><a href="#" class="remove" style="display: inline-block; color: darkred;"><i class="fa fa-times"></i></a></td></tr>');

									
												
												//												//console.log(input);
//									var url = "{{ route('autocomplete.ajax') }}";
//									console.log(rowLen);
//									$('.tabRow').on('focus', '.pname', function () { 
//										$(this).autocomplete({ autocompleteOptions });
//									});
//									$(".tabRow:last").children("td").children("input").each(function(index, element){
//										$(element).val("");
//									});		
								
												var newtr = $('<tr class="tabRow" id="item'+ rowLen +'"><td class="sno" id="sno'+ rowLen +'"></td><td id="pname'+ rowLen +'"><input type="text" class="form-control pname" id="product_name'+ rowLen +'" name="product_name[]" value="" placeholder="Product name" autocomplete="off"></td><td><input type="text" class="form-control" id="product_qty'+ rowLen +'" name="product_qty[]" value="" placeholder="Prod. Qty" style="width: 120px; display: inline-block"></td><td><input type="text" class="form-control" id="product_tax'+ rowLen +'" name="product_tax[]" value="" placeholder="Prod. Tax" style="width: 120px; display: inline-block"></td><td><input type="text" class="form-control" id="product_description'+ rowLen +'" name="product_description[]" value="" placeholder="Product Description"></td><td><i class="fa fa-inr" style="display: inline-block"></i>&nbsp;&nbsp;<input type="text" class="form-control" id="price'+ rowLen +'" name="price[]" style="width: 60px; display: inline-block"></input></td><td><i class="fa fa-inr" style="display: inline-block"></i>&nbsp;&nbsp;<input type="text" class="form-control" id="sub-total'+ rowLen +'" name="subtotal[]" style="width: 60px; display: inline-block"></input></td><td><a href="#" class="remove" style="display: inline-block; color: darkred;"><i class="fa fa-times"></i></a></td></tr>');
								
												$("#mytable>tbody").append(newtr); 
												
											 
												var id= $("#item"+rowLen).find("#pname"+rowLen).find("input");
												console.log(id);
												id.on('focusin', function() {
													console.log($(this).attr('id'));
													
													$(this).css("background-color", "yellow");
												//	$(this).autocomplete(autocompleteOptions);
													

												});
												
												//$("#item"+rowLen).find("#pname"+rowLen).find("input").autocomplete(autocompleteOptions);
												
												rowLen++;
												return false;
											}
										});
									});
									
									
//									var autocompleteOptions = {
//											minLength: 3,
//											source:  function (query, process) {
//												console.log(query);
//												return $.get(url, { query: query }, function (data) {
//													console.log(data);
//													return process(data);
//												});
//											}
//										};
//								
		
									//var rowLen =  $('tr.tabRow').length;
					
									//$("#mytable").each(function () {
//							var tds = '<tr>';
//							jQuery.each($('tr:last td', this), function () {
//								var srno = $('#srno').html();
//								var isrno = parseInt(srno);
//								isrno += 1;
//								
//								tds += '<td>' + $(this).html() + '</td>';
//							});
//							tds += '</tr>';
//							if ($('tbody', this).length > 0) {
//								$('tbody', this).append(tds);
//							} else {
//								$(this).append(tds);
//							}
//						});
		$(document).on("click", ".add, .remove", function(){
        
									$("td.sno").each(function(index,element){                 
										$(element).text(index + 1); 
									});
									});
				
					
									$("#mytable").on('click', '.remove', function () {
										$(this).closest('tr').remove();
									});
//					
									var url = "{{ route('autocomplete.ajax') }}";
	
									$('.pname').autocomplete({
										source:  function (query, process) {
											//console.log(query);
											return $.get(url, { query: query }, function (data) {
												//console.log(data);
												return process(data);
											});
										}
									});
					
									var urlname = "{{ route('autocomplete.name') }}";
									$('#cust_name').autocomplete({
										source:  function (query, process) {
											return $.get(urlname, { query: query }, function (data) {
												console.log(data);
												return process(data);
											});
										}
									});
					
									$('.pname').on('change', function(event) {
										var x = $(this).val();
										console.log(x);
										$.get("{{ url('/productData')}}", 
											  { name: x }, 
											  function(data) {
											console.log(data)
											$.each(data, function(index, element) {
												console.log(data);
												$('#price').val(element.prod_price);
												$('#product_description').val(element.prod_description);
											});
											
										});        
									});
					
									$('#cust_name').on('change', function(event) {
										var x = $(this).val();
										console.log(x);
										$.get("{{ url('/customerData')}}", 
											  { name: x }, 
											  function(data) {
												console.log(data)
												var address = $('#address');
												address.val(data);
											
										});        
									});
					
									$('#product_qty').on('change', function(event) {
										var subtotal = $(this).val() * $('#price').val();
										//console.log($('#price').html());
										$('#sub-total').val(subtotal);
										var subtotal = $('#sub-total').val();
										console.log(subtotal);
						
										var total = $('#total').val();
										if(total == '') { total = 0; }
										$('#total').val(parseInt(total) + parseInt(subtotal));
									});	

							</script>

                                <br>
                               <div class="row">
								<input type="submit" class="btn btn-primary" value="Add" style="width: 80px; margin-left: 20px;">
								<a class="btn btn-primary btn-close" href="{{ url('/customers') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       					`	</div>
                            </form>

							
                        </div>
                    </div>

					<div class="card">
                        <div class="header bg-blue">
		
				 		<center><h1 style="display: inline-block">Find Invoice</h1></center>
							
                        </div>
                        <div class="body">
							<form action="{{ url('/searchinvoice') }}" method="post">
							@csrf
								<center><label>Enter Customer Name to search if their invoice is stored already and get their final invoice ready!</label><br></center>
								
								<label for="name">Customer Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ $errors->has('name') ? '' : old('name') }}" placeholder="Customer name">
                                    </div>
									 @if ($errors->has('name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('name') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<div class="row">
									<center><input type="submit" class="btn btn-success" value="Search" style="width: 80px"></center>
       							</div>
								
								<script>
						
									var urlname = "{{ route('autocomplete.name') }}";
									$('#name').autocomplete({
										source:  function (query, process) {
											return $.get(urlname, { query: query }, function (data) {
												console.log(data);
												return process(data);
											});
										}
									});
						
									$('#name').on('change', function(event) {
										var x = $(this).val();
										console.log(x);
										$.get("{{ url('/customerData')}}", 
											  { name: x }, 
											  function(data) {
											console.log(data)
											var address = $('#address');
											address.val(data);

										});        
									});
								</script>
							</form>
                        </div>
                    </div>
                </div>
            </div>
</section>


