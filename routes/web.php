<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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

Route::get('/transaction/pay', [TransactionController::class, 'index'])->name('transaction.pay');
Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('/transaction/history', [TransactionController::class, 'history'])->name('transaction.history');

Route::get('transaction/{transaction}/pdf', [TransactionController::class, 'pdf'])->name('transaction.pdf');

require __DIR__ . '/auth.php';
