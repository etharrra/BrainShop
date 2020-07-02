@extends('backendtemplate')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tag pr-3"></i> 
    Category 
  </h1>
  @if(session('category_delete'))
    <div class="alert alert-warning">
    {{ session('category_delete') }}
    </div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-10">
          <h4 class="m-0 font-weight-bold text-primary"> 
            List 
          </h4>
        </div>

        <div class="col-2">
          <a href="{{route('category.create')}}" class="btn btn-outline-primary btn-block float-right"> 
            <i class="fa fa-plus pr-2"></i> Add New 
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">



      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> No </th>
              <th > Name </th>
              <th width="40%"> Sub-category </th>

              <th> Action </th>
            </tr>
          </thead>

          <tbody>
            @php $i = 1; @endphp
            @foreach($categories as $category)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$category->name}}</td>
                <td>
                  @foreach ($category->subcategories as $subcategories)
                  <span class="badge badge-pill badge-success">
                    {{$subcategories->name}}                     
                  </span>
                  @endforeach
                </td>
                <td>
                  <a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-warning btnedit">
                    <i class="fas fa-edit"></i>
                  </a>

                  <form method="post" action="{{route('category.destroy',$category->id)}}" onsubmit="return confirm('Are You Sure?')" class="d-inline-block"> 
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-outline-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>



        </table>
      </div>
    </div>
  </div>

</div>
@endsection