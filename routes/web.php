<?php

use App\Models\Product;
use App\Events\ProductUpdated;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $products = Product::all();
    return view('products.index', compact('products'));
});
Route ::resource('products', ProductController::class);
Route::get('/fetch-products', [ProductController::class, 'fetchAndStore'])->name('fetch-products');
Route::get('/product-sync', [ProductController::class, 'syncProduct'])->name('product-sync');
