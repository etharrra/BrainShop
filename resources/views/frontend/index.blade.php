@extends('frontendtemplate')
@section('content')

	<div class="container my-5">

		<h1 class="mt-4 mb-3 primary position-relative"> 
			Flash Sale
		</h1>
		<hr style="background-color: #673AB7; height: 2px; max-width: 200px; margin: 0px;">

		<div class="row my-5">

			@foreach($items as $item)
				<div class="col-lg-3 col-sm-6 portfolio-item">
					<div class="card h-100 ">
						<a href="#">
							<img class="card-img-top" src="{{$item->photo}}" alt="" >
						</a>

						<div class="card-body p-3">
							<h6 class="card-title text-center mb-4">
								<a href="#" class="secondary">  </a>
							</h6>

								<p class="font-weight-lighter d-inline"> <del> Ks </del>  </p>

								<h4 class="text-danger d-inline">  Ks </h4>


								<h4 class="text-danger">  Ks </h4>

						</div>

							<div class="card-footer bg-transparent">
								@auth
								<a href="javascript:void(0)" class="btn btn-secondary btn-block addtocart" data-id="" data-name="" data-codeno="" data-price="" data-discount="" data-photo="" style="background-color: #673AB7; border-color: #673AB7"> 	
									<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
								</a>
								@endauth

								@guest
								<a href="login" class="btn btn-secondary btn-block" > 	
									<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
								</a>
								@endguest
								
							</div>

					</div>
				</div>
			@endforeach
		</div>
	<!-- /.row -->

		<!-- Our Customers -->
		<h2 class="mt-5 primary mb-3"> Categories </h2>
		<hr style="background-color: #673AB7; height: 2px; max-width: 170px; margin: 0px;">

		<div class="row mt-5">
			@foreach($categories as $category)
				<div class="col-lg-2 col-sm-4 mb-4 text-center">
					<a href=" {{ url("/categories/detail/$category->id")}}" class="secondary">
						<img class="img-fluid mx-auto d-block w-25" src="{{url('frontend/img/cate.png')}}" alt="">
						<p class="mt-2">{{$category->name}}</p>
					</a>
				</div>
			@endforeach
		</div>

	</div>

@endsection