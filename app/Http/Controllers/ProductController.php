<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Events\ProductUpdated;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $product = Product::create($request->only('name', 'description', 'price'));
        broadcast(new ProductUpdated($product))->toOthers();
        notify()->success('New Product added!');
        return redirect()->back();
    }

    public function fetchAndStore()
    {
        $response = Http::get('https://fakestoreapi.com/products');
        foreach ($response->json() as $item) {
            $product = Product::updateOrCreate(
                ['name' => $item['title']],
                [
                    'description' => $item['description'],
                    'price' => $item['price'],
                ]
            );
    
            broadcast(new ProductUpdated($product))->toOthers();
        }
        notify()->success('Products fetched and broadcasted!');
        return redirect('/product-sync');

    }
    public function syncProduct(){
        return view('products.sync');
    }
}
