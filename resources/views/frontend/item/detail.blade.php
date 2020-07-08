@extends('frontendtemplate')
@section('content')

	<div class="container my-5">
		<ol class="breadcrumb">
	      	<li class="breadcrumb-item">
	        	<a href="{{ url('/categories')}}">{{$category->name}}</a>
	      	</li>
	      	<li class="breadcrumb-item active">{{$subcategory->name}}</li>
	    </ol>

		<div class="row">
			<div class="col-md-6 col-sm-12 text-center">
				<a href='{{ url("/items/detail/$item->id")}}'>
					<img class="card-img-top" src="{{$item->photo}}" alt="" >
				</a>
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
					@auth
					<a href="javascript:void(0)" class="btn btn-secondary btn-block addtocart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-photo="{{$item->photo}}" style="background-color: #673AB7; border-color: #673AB7"> 	
						<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
					</a>
					@endauth

					@guest
					<a href="login" class="btn btn-secondary btn-block" > 	
						<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
					</a>
					@endguest
				</div>

				<!-- Description -->
				<div>
					<textarea class="form-control summernote" readonly="">{{$item->description}}</textarea>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-12">
				<h3 class="text-center">Related Items</h3>				
			</div>
		</div>
		<div class="row">
			@foreach($items as $its)
			@if($its->id == $item->id) @continue @endif
			<div class="col-lg-2 col-sm-6 portfolio-its">
				<div class="card h-100 ">
					<a href='{{ url("/items/detail/$its->id")}}'>
						<img class="card-img-top" src="{{$its->photo}}" alt="" >
					</a>

					<div class="card-body p-3">
						<h6 class="card-title text-center mb-4">
							<a href="#" class="secondary">{{$its->name}}</a>
						</h6>
						@if ($its->discount != 0)
						<p class="font-weight-lighter d-inline"> 
							<del>${{$its->price}}</del>
						</p>
						<h4 class="text-danger d-inline">${{$its->discount}}</h4>
						@else
						<h4 class="text-danger">${{$its->price}}</h4>
						@endif

					</div>

					<!-- <div class="card-footer bg-transparent">

						<a href="javascript:void(0)" class="btn btn-secondary btn-block addtocart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-photo="{{$item->photo}}" style="background-color: #673AB7; border-color: #673AB7"> 	
							<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
						</a>

						<a href="login" class="btn btn-secondary btn-block" > 	
							<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
						</a>


					</div> -->

				</div>
			</div>
			@endforeach			
		</div>

	</div>

@endsection