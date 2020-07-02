@extends('backendtemplate')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tag pr-3"></i> 
    Brand 
  </h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-10">
          <h4 class="m-0 font-weight-bold text-primary"> 
            Edit Existing Brand 
          </h4>
          @if($errors->any())
          <div class="alert alert-warning">
            <ol>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ol>
          </div>
          @endif
        </div>

        <div class="col-2">
          <a href="{{route('brand.index')}}" class="btn btn-outline-primary btn-block float-right"> 
            <i class="fa fa-backward pr-2"></i> Go Back 
          </a>
        </div>
      </div>

    </div>
    <div class="card-body">
      <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        
        <input type="hidden" name="id" value="{{$brand->id}}">
        <input type="hidden" name="oldlogo" value="{{$brand->logo}}">

        <div class="form-group row">
          <label for="categoryName" class="col-sm-2 col-form-label"> Logo  </label>

          <div class="col-sm-10">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="oldprofile-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="oldprofile" aria-selected="true"> Old Logo </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="newprofile-tab" data-toggle="tab" href="#newprofile" role="tab" aria-controls="newprofile" aria-selected="false"> New Logo</a>
              </li>
            </ul>

            <div class="tab-content mt-2" id="myTabContent">
              <div class="tab-pane fade show active" id="oldprofile" role="tabpanel" aria-labelledby="oldprofile-tab">
                <img src="<?= $brand->logo; ?>" class="img-fluid" style="width: 10%;">
              </div>

              <div class="tab-pane fade" id="newprofile" role="tabpanel" aria-labelledby="newprofile-tab">
                <input type="file" name="logo" class="form-control-file">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="brandName" class="col-sm-2 col-form-label"> Name </label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="brandName" placeholder="Enter Sub-brand Name" name="name" value="{{$brand->name}}">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-upload"></i> Update
            </button>
          </div>
        </div>

      </form>

    </div>
  </div>

</div>
@endsection