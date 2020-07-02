@extends('backendtemplate')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tag pr-3"></i> 
    Sub-category 
  </h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-10">
          <h4 class="m-0 font-weight-bold text-primary"> 
            Create New Sub-category 
          </h4>
        </div>

        <div class="col-2">
          <a href="{{route('subcategory.index')}}" class="btn btn-outline-primary btn-block float-right"> 
            <i class="fa fa-backward pr-2"></i> Go Back 
          </a>
        </div>
      </div>

    </div>
    <div class="card-body">
      <form action="{{route('subcategory.store')}}" method="POST">
        {{ csrf_field() }}
        @if($errors->any())
        <div class="alert alert-warning">
          <ol>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ol>
        </div>
        @endif
        <div class="form-group row">
          <label for="subcategoryName" class="col-sm-2 col-form-label"> Name </label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="subcategoryName" placeholder="Enter subcategory Name" name="name">
          </div>
        </div>

        <div class="form-group row">
          <label for="categoryName" class="col-sm-2 col-form-label"> Category </label>

          <div class="col-sm-10">
            <select class="form-control" name="category_id">
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-save"></i> Save
            </button>
          </div>
        </div>

      </form>

    </div>
  </div>

</div>
@endsection