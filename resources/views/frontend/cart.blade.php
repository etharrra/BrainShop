@extends('frontendtemplate')
@section('content')

	<div class="container">
		<h1 class="mt-4 mb-3">Your Cart</h1>

		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="categories" class="btn btn-secondary float-right px-3" style="background: #673AB7;border-color: #673AB7">
					<i class="fas fa-shopping-cart"></i>
					Continue Shopping
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3">Product</th>
							<th colspan="3">QTY</th>
							<th>Price</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody id="shoppingcart_table">
						
					</tbody>
					<tfoot id="shoppingcart_tfoot">

					</tfoot>
				</table>
			</div>
		</div>
		
		<div class="row mt-5 noneshoppingcart_div text-center">
			<div class="col-12">
				<h5 class="text-center">There are no items in this cart</h5>
			</div>
			<div class="col-12 mt-5">
				<a href="categories" class="btn btn-secondary px-3" style="background: #673AB7;border-color: #673AB7">
					<i class="fas fa-shopping-cart"></i>
					Continue Shopping
				</a>
			</div>
		</div>
	</div>

@endsection