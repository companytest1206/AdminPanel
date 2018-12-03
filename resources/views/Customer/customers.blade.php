@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
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
    <li class="active"><i class="material-icons">wc</i> Customers</li>
</ol>
<section class="content">
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
<!--								<label class="label label-warning" style="float: right; margin-right: 20px">Company</label>-->
                               Customer's Details: &nbsp;<small>(Only customer's details are viewed here and can be accessed here)</small>
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('customers/new') }}">Add New Customer</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                 <tr>
                  					<th>Sr No.</th>
                  					<th>Customer Name</th>
                  					<th>Customer Address</th>
                  					<th>Customer Phone</th>
                  					<th>Customer Email</th>
                  					<th>Created At</th>
                  					<th colspan="2"><center>Actions</center></th>
                				</tr>
								@php
									$i = $customers->perPage() * ($customers->currentPage()-1);
								@endphp
								@if($customers === [])
				 					<tr><td colspan="7"><center>No records available</center></td></tr>
								@else
								@foreach($customers as $customer)
                				<tr>
                  					<td>{{++$i}}</td>
                  					<td>{{$customer->name}}</td>
                  					<td>{{$customer->address}}</td>
                  					<td>{{$customer->phone}}</td>
                  					<td>{{$customer->email}}</td>
                  					<td>{{$customer->created_at}}</td>    
                  					<td><a href="{{ url('customers/edit',[$customer->cust_id]) }}" class="btn btn-primary"><i class="material-icons" style="margin-bottom: 5px">edit</i></a></td>
				  					<td>
									<form method="POST" >
										<input type="hidden" id="_token" value="{{ csrf_token() }}">
										{{ csrf_field() }}
										<a class="btn btn-danger button" data-id="{{$customer->cust_id}}"><i class="material-icons" style="margin-bottom: 5px">delete</i></a>
									</form>
									</td>
				  				</tr>
				  				@endforeach
				  				@endif
                                </tbody>
                            </table>
							<center>{{$customers->links()}}</center><!-- or {{$customers->links()}}-->
							<script>
									$(document).on('click', '.button', function (e) {
												//e.preventDefault();
										var id = $(this).data('id');
										console.log(id);
											swal({
												title: "Are you sure you want to this customer?",
												text: "This customer will will be deleted from your database permenantly!",
												type: "warning",
												showCancelButton: true,
												confirmButtonColor: "#DD6B55",
												confirmButtonText: "Yes, delete it!",
												closeOnConfirm: false
											}, function () {													
												$.post("{{url('customers/delete')}}", { _token : $('#_token').val(), id: id }).done(function(data) {
													location.reload();
													console.log(data);
													swal("Deleted!", 'Customer has been deleted successfully.!', "success");
												}).fail(function(xhr, status, error) {
													console.log(xhr);
												})
											});
									});
							</script>
                        </div>
                    </div>
                </div>
            </div>
			@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  			    @if(Session::has('alert-' . $msg))
					<script>
						$(document).ready( function() {
							//swal("Deleted!", 'Company has been deleted successfully.!', "success");
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