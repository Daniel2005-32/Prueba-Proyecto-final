<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/category/{categorySlug}', [ProductController::class, 'byCategory'])->name('category');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('show');
});

// Offers
Route::get('/ofertas', function () {
    $offers = [
        (object)[
            'name' => 'PlayStation 5',
            'price' => 449.99,
            'original_price' => 499.99,
            'image' => 'https://images.unsplash.com/photo-1644571580646-7048372c491a?w=500',
            'slug' => 'ps5'
        ],
        (object)[
            'name' => 'Nintendo Switch OLED',
            'price' => 299.99,
            'original_price' => 349.99,
            'image' => 'https://images.unsplash.com/photo-1676261233849-0755de764396?w=500',
            'slug' => 'switch-oled'
        ]
    ];
    return view('offers', compact('offers'));
})->name('offers');

// Contact
Route::get('/contacto', function () {
    return view('contact');
})->name('contact');

// Cart
Route::post('/cart/add/{id}', [OrderController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [OrderController::class, 'viewCart'])->name('cart.index');
Route::post('/cart/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');

// Auctions
Route::get('/auctions', [AuctionController::class, 'index'])->name('auctions.index');
Route::get('/auctions/{id}', [AuctionController::class, 'show'])->name('auctions.show');
Route::post('/auctions/{id}/bid', [AuctionController::class, 'placeBid'])->name('auctions.bid');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth routes
require __DIR__.'/auth.php';