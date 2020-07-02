@extends('backendtemplate')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tag pr-3"></i> 
    item 
  </h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-10">
          <h4 class="m-0 font-weight-bold text-primary"> 
            Edit Existing item 
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
          <a href="{{route('item.index')}}" class="btn btn-outline-primary btn-block float-right"> 
            <i class="fa fa-backward pr-2"></i> Go Back 
          </a>
        </div>
      </div>

    </div>
    <div class="card-body">
      <form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="hidden" name="oldphoto" value="{{$item->photo}}">

        <div class="form-group row">
          <label for="categoryName" class="col-sm-2 col-form-label"> Photo  </label>

          <div class="col-sm-10">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="oldprofile-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="oldprofile" aria-selected="true"> Old Photo </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="newprofile-tab" data-toggle="tab" href="#newprofile" role="tab" aria-controls="newprofile" aria-selected="false"> New Photo</a>
              </li>
            </ul>

            <div class="tab-content mt-2" id="myTabContent">
              <div class="tab-pane fade show active" id="oldprofile" role="tabpanel" aria-labelledby="oldprofile-tab">
                <img src="<?= $item->photo; ?>" class="img-fluid" style="width: 10%;">
              </div>

              <div class="tab-pane fade" id="newprofile" role="tabpanel" aria-labelledby="newprofile-tab">
                <input type="file" name="photo" class="form-control-file">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="itemName" class="col-sm-2 col-form-label"> Name </label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="itemName" placeholder="Enter Sub-item Name" name="name" value="{{$item->name}}">
          </div>
        </div>

        <div class="form-group row">
          <label for="brandName" class="col-sm-2 col-form-label"> Price </label>

          <div class="col-sm-10">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-price-tab" data-toggle="tab" href="#nav-price" role="tab" aria-controls="nav-price" aria-selected="true"> Price </a>

                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Discount </a>
              </div>
            </nav>

            <div class="tab-content mt-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab">
                <input type="number" class="form-control" id="brandName" placeholder="Enter Price" name="price" value="{{$item->price}}">
              </div>

              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <input type="text" class="form-control" id="brandName" placeholder="Enter Discount Price" name="discount" value="{{$item->discount}}">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="brandName" class="col-sm-2 col-form-label"> Description </label>

          <div class="col-sm-10">
            <textarea class="form-control summernote" name="description">{{$item->description}}</textarea>
          </div>
        </div>

        <div class="form-group row">
          <label for="brandName" class="col-sm-2 col-form-label"> Brand </label>

          <div class="col-sm-10">
            <select class="form-control" name="brand_id">
            @foreach ($brands as $brand)
              <option value="{{$brand->id}}" @if($brand->id == $item->brand_id) {{"selected"}} @endif>{{$brand->name}}</option>
            @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="subcategoryName" class="col-sm-2 col-form-label"> subcategory </label>

          <div class="col-sm-10">
            <select class="form-control" name="subcategory_id">
            @foreach ($subcategories as $subcategory)
              <option value="{{$subcategory->id}}" @if($subcategory->id == $item->subcategory_id) {{"selected"}} @endif>{{$subcategory->name}}</option>
            @endforeach
            </select>
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