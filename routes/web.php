<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::resource('product', ProductController::class);

    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart', [CartController::class, 'store'])->name('cart.store');
    Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::get('order-history', [OrderController::class, 'history'])->name('order.history');
    Route::post('order', [OrderController::class, 'store'])->name('order.store');

    Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('transaction/{order}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::patch('transaction/{order}/process', [TransactionController::class, 'process'])->name('transaction.process');
    Route::patch('transaction/{order}/send', [TransactionController::class, 'send'])->name('transaction.send');
    Route::patch('transaction/{order}/done', [TransactionController::class, 'done'])->name('transaction.done');
    Route::patch('transaction/{order}/submit', [TransactionController::class, 'submit'])->name('transaction.submit');
    Route::patch('transaction/{order}/decline', [TransactionController::class, 'decline'])->name('transaction.decline');

    Route::patch('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::patch('profile/update-kitchen', [ProfileController::class, 'updateKitchen'])->name('profile.update-kitchen');
});

require __DIR__ . '/auth.php';
