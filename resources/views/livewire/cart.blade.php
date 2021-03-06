<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<h2 class="font-weight-bold mb-3">Product List</h2>
				<div class="row">
					@foreach ($products as $product)
						<div class="col-md-3 mb-3">
							<div class="card">
								<div class="card-body">
									<img src="{{ asset('storage/images/'.$product->image) }}" alt="product image" class="img-fluid">
								</div>
								<div class="card-footer">
									<h6 class="text-center font-weight-bold">{{ $product->name }}</h6>
									<button wire:click="addItem({{ $product->id }})" class="btn btn-primary btn-sm btn-block">Add to Cart</button>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<h2 class="font-weight-bold mb-3">Cart List</h2>
				<p class="text-danger font-weight-bold">
					@if (session()->has('error'))
						*{{ session('error') }}
					@endif
				</p>
				<table class="table table-bordered table-hover table-sm">
					<thead class="bg-secondary text-white">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($carts as $index=>$cart)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>
									<a href="#" class="font-weight-bold text-dark">{{ $cart['name'] }}</a>
									<br>
									Qty: {{ $cart['qty'] }}
									<a wire:click="increaseItem('{{ $cart['rowId'] }}')" class="btn btn-primary btn-sm font-weight-bold text-white">+</a>
									<a wire:click="decreaseItem('{{ $cart['rowId'] }}')" class="btn btn-warning btn-sm font-weight-bold text-white">-</a>
									<a wire:click="removeItem('{{ $cart['rowId'] }}')" class="btn btn-danger btn-sm font-weight-bold text-white">x</a>									

								</td>
								<td>{{ $cart['price'] }}</td>
							</tr>						
						@empty
							<td colspan="3"><h6 class="text-center">Empty Cart</h6></td>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<h4 class="font-weight-bold">Cart Summary</h4>
				<h5 class="font-weight-bold">Sub Total: {{ $summary['sub_total'] }}</h5>
				<h5 class="font-weight-bold">Tax: {{ $summary['pajak'] }}</h5>
				<h5 class="font-weight-bold">Total {{ $summary['total'] }}</h5>
				<div>
					<button wire:click="enableTax" class="btn btn-primary btn-block">Add Tax</button>
					<button wire:click="disableTax" class="btn btn-danger btn-block">Remove Tax</button>
				</div>
				<div class="mt-4">
					<button class="btn btn-success btn-block">Save Transaction</button>
				</div>
			</div>
		</div>
	</div>
</div>
