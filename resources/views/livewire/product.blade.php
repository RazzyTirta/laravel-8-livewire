<div>
    <div class="row">
    	<div class="col-md-8">
    		<div class="card">
    			<div class="card-body">
    				<h2 class="font-weight-bold mb-3">Product List</h2>
    				<table class="table table-bordered table-hovered table-striped">
    					<thead>
    						<tr>
    							<th>No</th>
    							<th>Name</th>
    							<th width="20%">Image</th>
    							<th>Description</th>
    							<th>Qty</th>
    							<th>Price</th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach ($products as $index=>$product)
    							<tr>
    								<td>{{ $index + 1 }}</td>
    								<td>{{ $product->name }}</td>
    								<td><img src="{{ asset('storage/images/'.$product->image) }}" alt="product image" class="img-fluid"></td>
    								<td>{{ $product->description }}</td>
    								<td>{{ $product->qty }}</td>
    								<td>{{ $product->price }}</td>
    							</tr>
    						@endforeach
    					</tbody>
    				</table>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-4">
    		<div class="card">
    			<div class="card-body">
    				<h2 class="font-weight-bold mb-3">Create Product</h2>
    				<form action="" method="POST" wire:submit.prevent="store">
    					<div class="form-group">
    						<label for="">Product Name</label>
    						<input wire:model="name" type="text" class="form-control">
    						@error('name') <small class="text-danger">{{ $message }}</small>@enderror
    					</div>
    					<div class="form-group">
    						<label for="">Image</label>
    						<div class="custom-file">
    							<input wire:model="image" type="file" class="custom-file-input" id="customFile">
    							<label for="customFile" class="custom-file-label">Choose Image</label>
    							@error('image') <small class="text-danger">{{ $message }}</small>@enderror
    						</div>
    						@if ($image)
    							<label class="mt-2">Image Preview:</label>
    							<img src="{{ $image->temporaryUrl() }}" class="img-fluid" alt="Preview Image">
    						@endif
    					</div>
    					<div class="form-group">
    						<label for="">Description</label>
    						<textarea wire:model="description" class="form-control" rows="5"></textarea>
    						@error('description') <small class="text-danger">{{ $message }}</small>@enderror
    					</div>
    					<div class="form-group">
    						<label for="">Qty</label>
    						<input wire:model="qty" type="number" class="form-control">
    						@error('qty') <small class="text-danger">{{ $message }}</small>@enderror
    					</div>
    					<div class="form-group">
    						<label for="">Price</label>
    						<input wire:model="price" type="number" class="form-control">
    						@error('price') <small class="text-danger">{{ $message }}</small>@enderror
    					</div>
    					<div class="form-group">
    						<button type="submit" class="btn btn-primary btn-block">Save Product</button>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
</div>
