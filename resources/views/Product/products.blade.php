@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <li class="active"><i class="material-icons">shopping_cart</i> Products</li>
</ol>
<section class="content">
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
<!--								<label class="label label-warning" style="float: right; margin-right: 20px">Company</label>-->
                               Product Details:
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('products/new') }}">Add New Product</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <tr>
                  					<th>Sr No.</th>
                  					<th>Product Name</th>
                  					<th>Product Description</th>
                  					<th>Product Price</th>
                  					<th>Created At</th>
                  					<th colspan="2"><center>Actions</center></th>
                				</tr>
								@php
									$i = $products->perPage() * ($products->currentPage()-1);
								@endphp
								@if($products === [])
				 					<tr><td colspan="7"><center>No records available</center></td></tr>
								@else
								@foreach($products as $product)
                				<tr>
                  					<td>{{++$i}}</td>
                  					<td>{{$product->prod_name}}</td>
                  					<td>{{$product->prod_description}}</td>
                  					<td>{{$product->prod_price}}</td>
                  					<td>{{$product->created_at}}</td>    
                  					<td><a href="{{ url('products/edit',[$product->prod_id]) }}" class="btn btn-primary"><i class="material-icons" style="margin-bottom: 5px">edit</i></a></td>
				  					<td>
										<form action="{{url('products/delete', [$product->prod_id])}}" method="POST">
										<input type="hidden" name="_method" value="DELETE">
										{{ csrf_field() }}
										<button type="submit" class="btn btn-danger" onclick = "return confirm('Are you sure you want to delete this product?');"><i class="material-icons" style="margin-bottom: 5px">delete</i></button>
										</form>
									</td>
				  				</tr>
				  			@endforeach
				  			@endif
                            </tbody>
                            </table>
							<center>{{$products->links()}}</center><!-- or {{$products->links()}}-->
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