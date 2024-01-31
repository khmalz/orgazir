<?php

use Barryvdh\DomPDF\Facade\Pdf;
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

Route::get('/transaction/history', function () {
    return view('transaction.history');
})->name('transaction.history');

Route::get('pdf', function () {
    $invoiceNumber = '123456';
    $date = now()->format('Y-m-d H:i:s');

    $items = [
        ['name' => 'Product 1', 'quantity' => 2, 'price' => 10, 'total' => 20],
        ['name' => 'Product 2', 'quantity' => 1, 'price' => 15, 'total' => 15],
    ];

    $subtotal = array_sum(array_column($items, 'total'));
    $discount = 5; // Example discount amount
    $total = $subtotal - $discount;

    $pdf = Pdf::loadView('invoice.pdf', compact('invoiceNumber', 'date', 'items', 'subtotal', 'discount', 'total'));
    return $pdf->stream('invoice.pdf');
})->name('pdf');

Route::get('/transaction/pay', [TransactionController::class, 'index'])->name('transaction.pay');

require __DIR__ . '/auth.php';
