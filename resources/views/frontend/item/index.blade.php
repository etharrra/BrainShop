@extends('frontendtemplate')
@section('content')

	<div class="container">
		<h1 class="mt-4 mb-3 primary position-relative"> 
			All Items
		</h1>
		<hr style="background-color: #673AB7; height: 2px; max-width: 200px; margin: 0px;">

		<div class="row my-5">

			@foreach($items as $item)
			<div class="col-lg-3 col-sm-6 portfolio-item">
				<div class="card h-100 ">
					<a href='{{ url("/items/detail/$item->id")}}'>
						<img class="card-img-top" src="{{$item->photo}}" alt="" >
					</a>

					<div class="card-body p-3">
						<h6 class="card-title text-center mb-4">
							<a href="#" class="secondary">{{$item->name}}</a>
						</h6>
						@if ($item->discount != 0)
						<p class="font-weight-lighter d-inline"> 
							<del>${{$item->price}}</del>
						</p>
						<h4 class="text-danger d-inline">${{$item->discount}}</h4>
						@else
						<h4 class="text-danger">${{$item->price}}</h4>
						@endif

					</div>

					<div class="card-footer bg-transparent">

						<a href="javascript:void(0)" class="btn btn-secondary btn-block addtocart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-photo="{{$item->photo}}" style="background-color: #673AB7; border-color: #673AB7"> 	
							<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
						</a>

						<a href="login" class="btn btn-secondary btn-block" > 	
							<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
						</a>


					</div>

				</div>
			</div>
			@endforeach
		</div>
	</div>

@endsection