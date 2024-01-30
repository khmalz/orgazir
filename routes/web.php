<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/product/list', function () {
    return view('product.index');
})->name('product.index');

Route::get('/cashier/list', function () {
    return view('cashier.index');
})->name('cashier.index');

Route::get('/transaction/history', function () {
    return view('transaction.history');
})->name('transaction.history');

Route::get('/transaction/pay', function () {
    return view('transaction.index');
})->name('transaction.pay');

require __DIR__ . '/auth.php';
