@extends('frontendtemplate')
@section('content')

	<div class="container my-5">

		<div class="row">
			<div class="col-md-6 col-sm-12 text-center">
				<img src="{{$item->photo}}" class="img-fluid w-75">
			</div>
			<div class="col-md-6 col-sm-12">
				<h2>{{$item->name}}</h2>
				@if ($item->discount != 0)
				<p class="font-weight-lighter d-inline"> 
					<del>${{$item->price}}</del>
				</p>
				<h4 class="text-danger d-inline">${{$item->discount}}</h4>
				@else
				<h4 class="text-danger">${{$item->price}}</h4>
				@endif

				<div class="card-footer bg-transparent">
					<a href="javascript:void(0)" class="btn btn-secondary btn-block addtocart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-photo="{{$item->photo}}" style="background-color: #673AB7; border-color: #673AB7"> 	
						<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
					</a>

					<a href="login" class="btn btn-secondary btn-block" > 	
						<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
					</a>
				</div>

				<!-- Description -->
				<div>
					{{$item->description}}
				</div>
			</div>
		</div>

	</div>

@endsection