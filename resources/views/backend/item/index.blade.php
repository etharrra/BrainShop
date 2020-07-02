@extends('backendtemplate')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-dolly pr-3"></i> 
    item 
  </h1>
  @if(session('item_delete'))
    <div class="alert alert-warning">
    {{ session('item_delete') }}
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
          <a href="{{route('item.create')}}" class="btn btn-outline-primary btn-block float-right"> 
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
              <th class="w-25"> Logo </th>
              <th>Name</th>
              <th>Brand</th>
              <th>Price</th>
              <th> Action </th>
            </tr>
          </thead>

          <tbody>
            @php $i = 1; @endphp
            @foreach($items as $item)
              <tr>
                <td>{{$i++}}</td>
                <td>
                  <img src="{{ asset($item->photo)}}" class="img-fluid w-50">
                </td>
                <td>{{$item->name}}</td>
                <td>{{$item->brand->name}}</td>
                <td>${{$item->price}}</td>
                <td>
                  <a href="{{route('item.show',$item->id)}}" class="btn btn-outline-success btn">
                    <i class="fas fa-info"></i>
                  </a>
                  <a href="{{route('item.edit',$item->id)}}" class="btn btn-outline-warning">
                    <i class="fas fa-edit"></i>
                  </a>

                  <form method="post" action="{{route('item.destroy',$item->id)}}" onsubmit="return confirm('Are You Sure?')" class="d-inline-block"> 
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