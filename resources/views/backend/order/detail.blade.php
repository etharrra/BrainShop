@extends('backendtemplate')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div >
      <table class="table table-dark table-responsive">
        <tbody>
          <tr>
            <td>INVOICE</td>
            <td>{{$voucherno}}</td>
          </tr>
          <tr>
            <td>Order Date</td>
            <td>{{$order->orderdate}}</td>
          </tr>
          <tr>
            <td>Customer Name</td>
            <td>{{$order->user->name}}</td>
          </tr>
        </tbody>
      </table>

    </div>
    
  </div>

  <div class="row">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-primary text-center" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Price</th>
          </tr>
        </thead>

        <tbody>
          @php $i = 1; $p=0; @endphp
          @foreach($orderdetails as $value)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$value->item->name}}</td>
              <td>{{$value->qty}}</td>
              <td>@if($value->item->discount > 0) {{$value->item->discount}} @else {{$value->item->price}} @endif</td>               
              <td>@if($value->item->discount > 0) {{$value->item->discount * $value->qty}} @else {{$value->item->price * $value->qty}} @endif</td>
            </tr>
          @endforeach

        </tbody>

        <tfoot>
          <tr>
            <td colspan=4><h4 style="font-weight: bold; color: red;">Total</h4></td>
            <td class="text-danger">{{$order->total}}</td>
          </tr>
        </tfoot>

      </table>

    </div>
  </div>

</div>
@endsection