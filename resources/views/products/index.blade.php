@extends('layouts.app')

@section('title', 'Products')


@section('content') 
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Our Products</h1>
       
        <span class="badge bg-dark fs-5" id="product-count">
            Total: {{ count($products) }}
        </span>
        <a class="btn btn-primary" href="{{ route('product-sync') }}" target="_blank"> Add Or Sync </a>
    </div>

    <div class="row" id="product-list">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4 product-item">
                <div class="product-card h-100">
                    <h5 class="fw-bold">{{ $product->name }}</h5>
                    <p class="text-muted mb-2">{{ Str::limit($product->description, 80) }}</p>
                    <div class="text-primary fw-semibold">${{ $product->price }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection