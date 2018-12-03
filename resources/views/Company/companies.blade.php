@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
<!--<script src="{{ asset('js/pages/ui/dialogs.js') }}"></script>-->

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
    <li class="active"><i class="material-icons">domain</i> Companies</li>
</ol>
<section class="content">

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
<!--								<label class="label label-warning" style="float: right; margin-right: 20px">Company</label>-->
                               Company's Details: &nbsp;<small>(Only company details are viewed here and can be accessed here)</small>
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('/companies/new') }}">Add New Company</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover" id="ctable">
                                <thead>
                                    <th>Sr No.</th>
            	    	  			<th>Company's Name</th>
                  					<th>Company's Url</th>
									<th>Company's Email</th>  
                  					<th>Company's Address</th>
                  					<th>Company's Phone</th>
                  					<th>Company's Username</th>
                  					<th>Company's Created At</th>
                  					<th colspan="2"><center>Actions</center></th>
                                </thead>
                                <tbody>
                                @php
									$i = $companies->perPage() * ($companies->currentPage()-1);
								@endphp
								@if($companies === [])
				 					<tr><td colspan="7"><center>No records available</center></td></tr>
								@else
								@foreach($companies as $company)
                				<tr id="ctr{{ $company->cid }}">
                  					<td>{{++$i}}</td>
                  					<td>{{$company->comp_name}}</td>
                  					<td>{{$company->comp_url}}</td>
                  					<td>{{$company->email}}</td>
                  					<td>{{$company->address}}</td>
                  					<td>{{$company->phone}}</td>
                  					<td>{{$company->username}}</td>
                  					<td>{{$company->created_at}}</td>
                  					<td><a href="{{ url('companies/edit',[$company->cid,$company->id]) }}" class="btn btn-primary"><i class="material-icons" style="margin-bottom: 5px">edit</i></a></td>
				  					<td>
									<form method="POST" >
										<input type="hidden" id="_token" value="{{ csrf_token() }}">
										{{ csrf_field() }}
										<a class="btn btn-danger button" data-id="{{$company->cid}}"><i class="material-icons" style="margin-bottom: 5px">delete</i></a>
									</form>
									</td>
				  				</tr>
				  				@endforeach
				  				@endif
                                </tbody>
                            </table>
							<center>{{$companies->links()}}</center><!-- or {{$companies->links()}}-->
							<script>
											$(document).on('click', '.button', function (e) {
												//e.preventDefault();
												var id = $(this).data('id');
												console.log(id);
												var del_id = $(this).parent("tr");
												//console.log(del_id);	
												swal({
													title: "Are you sure you want to this company?",
													text: "This company will will be deleted from your database permenantly!",
													type: "warning",
													showCancelButton: true,
													confirmButtonColor: "#DD6B55",
													confirmButtonText: "Yes, delete it!",
													closeOnConfirm: true
												}, function () {													
													$.post("{{url('companies/delete')}}", { _token : $('#_token').val(), id: id }).done(function(data) {
														console.log(data.deleted);
														location.reload();
														//$("tr#ctr"+data.deleted+"").remove();
														//swal("Deleted!", 'Company has been deleted successfully.!', "success");
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
<!--
			<div class="flash-message">
  			  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
  			    @if(Session::has('alert-' . $msg))
  			    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
				@endif
   			 @endforeach
 			</div>	
-->
</section>