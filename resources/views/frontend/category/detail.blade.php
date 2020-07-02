@extends('frontendtemplate')
@section('content')

	<div class="container mt-5">

	<h1 class="mt-4 mb-3 subcategoryTitle"></h1>
	@foreach ($category->subcategories as $subcat)
		<input type="hidden" id="subcategoryid" value="{{$subcat->id}}">
		@break
	@endforeach

	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index">Home</a>
		</li>

		<li class="breadcrumb-item">
			<a href="categories"> Category </a>
		</li>

		<li class="breadcrumb-item active">{{$category->name}}</li>
	</ol>


	<div class="row">
		<div class="col-lg-3 mb-4">
			<div class="list-group">
				@foreach ($category->subcategories as $subcat)
				<a href="javascript:void(0)" class="listgroup list-group-item " data-id="" id="subcategoryList">{{$subcat->name}}</a>
				@endforeach
			</div>
		</div>

		<div class="col-lg-9 mb-4">

			<div class="row" id="itemDiv"></div>

		</div>
	</div>

	</div>

@endsection