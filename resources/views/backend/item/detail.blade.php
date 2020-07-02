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
            Detail 
          </h4>
        </div>

        <div class="col-2">
          <a href="{{route('item.index')}}" class="btn btn-outline-primary btn-block float-right"> 
            <i class="fa fa-backward pr-2"></i> Go Back 
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">



      <div class="table-responsive">
        
      </div>
    </div>
  </div>

</div>
@endsection