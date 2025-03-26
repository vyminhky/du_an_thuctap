<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\OrderController as UserOrderController;



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/user', function () {
    return view("user.layout");
})->name('user.dashboard');

use App\Http\Controllers\Admin\CategoryController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');


    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('books', [BookController::class, 'store'])->name('books.store');
    Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::get('promotions', [\App\Http\Controllers\Admin\PromotionController::class, 'index'])->name('promotions.index');
    Route::get('promotions/create', [\App\Http\Controllers\Admin\PromotionController::class, 'create'])->name('promotions.create');
    Route::post('promotions', [\App\Http\Controllers\Admin\PromotionController::class, 'store'])->name('promotions.store');
    Route::get('promotions/{id}/edit', [\App\Http\Controllers\Admin\PromotionController::class, 'edit'])->name('promotions.edit');
    Route::put('promotions/{id}', [\App\Http\Controllers\Admin\PromotionController::class, 'update'])->name('promotions.update');
    Route::delete('promotions/{id}', [\App\Http\Controllers\Admin\PromotionController::class, 'destroy'])->name('promotions.destroy');

    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::post('users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('reviews', ReviewController::class);
});

use App\Http\Controllers\User\DashboardController;

Route::prefix('user')->name("user.")->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/books/category/{id}', [BookController::class, 'byCategory'])->name('books.byCategory');
// Route::get('/orders/{id}', [UserOrderController::class, 'show'])->name('orders.show');
//     Route::post('/orders/{id}/cancel', [UserOrderController::class, 'cancel'])->name('orders.cancel');
// routes/web.php
Route::get('/orders', [UserOrderController::class, 'index'])->name('orders.index');


use App\Http\Controllers\User\AccountController;

Route::prefix('account')->name('account.')->group(function () {
    Route::get('register', [AccountController::class, 'showRegisterForm'])->name('register.form');
    Route::post('register', [AccountController::class, 'register'])->name('register');

    Route::get('login', [AccountController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [AccountController::class, 'login'])->name('login');

    Route::post('logout', [AccountController::class, 'logout'])->name('logout');

    Route::get('profile', [AccountController::class, 'profile'])->name('profile');
    Route::post('profile', [AccountController::class, 'updateProfile'])->name('profile.update');
});
Route::get('/cart/add/{bookId}', [App\Http\Controllers\User\CartController::class, 'add'])->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update/{item}', [CartController::class, 'update'])->name('cart.update');

Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');


Route::get('/dat-hang', [UserOrderController::class, 'showForm'])->name('order.form');
Route::post('/dat-hang', [UserOrderController::class, 'placeOrder'])->name('order.place');
Route::post('/don-hang/{id}/huy', [UserOrderController::class, 'cancelOrder'])->name('user.order.cancel');
Route::post('/don-hang/{id}/nhan-hang', [UserOrderController::class, 'markAsReceived'])->name('user.order.received');
