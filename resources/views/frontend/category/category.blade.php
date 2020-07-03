@extends('frontendtemplate')
@section('content')
	<div class="container">

	    <!-- Page Heading/Breadcrumbs -->
	    <h1 class="mt-4 mb-3"> All Categories
	    </h1>

	    <ol class="breadcrumb">
	      	<li class="breadcrumb-item">
	        	<a href="{{ url('/')}}">Home</a>
	      	</li>
	      	<li class="breadcrumb-item active"> View More Categories </li>
	    </ol>

	    <div class="row">
	    	@foreach ($categories as $category)
		    <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item text-center">
		        <div class="card h-100 pt-3">
		          	<a href="{{ url("/categories/detail/$category->id")}}">
		          		<img class="card-img-top mx-auto d-block w-25" src="{{url('frontend/img/cate.png')}}" alt="">
		          	</a>
		          
		          	<div class="card-body">
		            	<h5 class="card-title">
		              		<a href="{{ url("/categories/detail/$category->id")}}" class="secondary"> {{$category->name}} </a>
		            	</h5>
		          	</div>
		        </div>
		    </div>
		    @endforeach
		</div>

	</div>
@endsection