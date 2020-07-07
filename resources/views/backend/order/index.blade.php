@extends('backendtemplate')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-bells pr-3"></i> 
    Orders 
  </h1>
  @if(session('orders_delete'))
    <div class="alert alert-warning">
    {{ session('orders_delete') }}
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
          <a href="{{route('order.create')}}" class="btn btn-outline-primary btn-block float-right"> 
            <i class="fa fa-plus pr-2"></i> Add New 
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">



      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> No </th>
              <th> User Name </th>
              <th> Voucher NO </th>
              <th> Order Date</th>
              <th> Total</th>
              <th>Status</th>

              <th> Action </th>
            </tr>
          </thead>

          <tbody>
            @php $i = 1; @endphp
            @foreach($orders as $order)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$order->user->name}}</td>
                <td><a href="{{route('order.show',$order->id)}}">{{$order->voucherno}}</a></td>
                <td>{{$order->orderdate}}</td>
                <td>$ {{$order->total}}</td>
                <td >
                  <span class="badge badge-pill badge-success">
                    {{$order->status}}
                  </span>
                </td>
                <td>
                  <a href="" class="btn btn-outline-warning btnedit">
                    <i class="fas fa-check"></i>
                  </a>
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