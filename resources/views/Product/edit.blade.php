@extends('layouts.app')
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
    <li><a href="/products"><i class="material-icons">shopping_cart</i> Products</a></li>
    <li class="active"><i class="material-icons">edit</i> Edit Product</li>
</ol>
<section class="content">
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
							<h2><strong>Update Product Details here:</strong></h2>							
						
						<!--
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('/companies') }}">Add New Company</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
-->

                        </div>
                        <div class="body">
                             <form action="{{url('products/edit',[$product->prod_id])}}" method="post">
  							@csrf
					  
                                <label for="prod_name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control {{ $errors->has('prod_name') ? ' is-invalid' : '' }}" value="{{ $errors->has('prod_name') ? '' : $product->prod_name }}" name="prod_name" placeholder="Product Name">
                                    </div>
									 @if ($errors->has('prod_name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('prod_name') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="prod_description">Address</label>
                                <div class="form-group">
									<div class="form-line">
                                    	<textarea class="form-control {{ $errors->has('prod_description') ? ' is-invalid' : '' }}" name="prod_description" placeholder="Product Description">{{ $errors->has('prod_description') ? '' : $product->prod_description }}</textarea>
									 	@if ($errors->has('prod_description'))
    									<span class="invalid-feedback" role="alert" style="color: red;">
      				  						{{ $errors->first('prod_description') }}
     			 						</span>
     			 						@endif
									</div>
								</div>
								
								<label for="prod_price">Phone No.</label>
                                <div class="form-group">
                                    <div class="form-line">
                                       <input type="text" class="form-control {{ $errors->has('prod_price') ? ' is-invalid' : '' }}" value="{{ $errors->has('prod_price') ? '' : $product->prod_price }}" name="prod_price" placeholder="Product Price">
                                    </div>
									 @if ($errors->has('prod_price'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('prod_price') }}
     			 					</span>
     			 					@endif
                                </div>
								
                                <br>
                                <div class="row">
									<input type="submit" class="btn btn-primary" value="Update" style="width: 80px; margin-left: 20px;">
									<a class="btn btn-primary btn-close" href="{{ url('/products') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       							</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</section>