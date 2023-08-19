<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [UserController::class, 'index'])->name('book.index');
Route::post('/check', [UserController::class, 'checkdb'])->name('checkdb');
Route::get('/{id}/show', [UserController::class, 'showbook'])->name('book.show');
Route::middleware(['auth'])->group(function () {
    Route::post('/add-to-cart', [PurchaseController::class,'addToCart'])->name('add.cart');
});
Route::get('/cart/{user_id}',[PurchaseController::class,'cartItems'])->name('book.cart');
Route::match(['post', 'delete'], '/cart/remove/{cart_id}', [PurchaseController::class, 'removeItem'])->name('cart.remove');
Route::get('/purchase/{user_id}', [PurchaseController::class,'orderSummary'])->name('book.purchase');
Route::post('/store', [PurchaseController::class, 'purchaseStore'])->name('book.store');
Route::get('/mybook', [BookController::class, 'mybook'])->name('book.mybook');
Route::get('/book/read/{id}', [BookController::class, 'readbook'])->name('book.read');
Route::get('/search', [BookController::class, 'search'])->name('book.search');
Route::get('/test', [UserController::class, 'test'])->name('test');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
