@extends('layouts.app')
@section('title', 'Sync Products || Add ')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Products</h2>
        <div>
            <a href="{{ route('fetch-products') }}" class="btn btn-primary me-2">Sync Products</a>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
        </div>
    </div>

    {{-- Your product list can go here if needed --}}
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">
                  <label for="name" class="form-label">Product Name</label>
                  <input type="text" class="form-control" name="name" required>
              </div>
              <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" name="description" rows="3"></textarea>
              </div>
              <div class="mb-3">
                  <label for="price" class="form-label">Price ($)</label>
                  <input type="number" class="form-control" name="price" step="0.01" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Product</button>
            
          </div>
        </div>
    </form>
  </div>
</div>
@endsection