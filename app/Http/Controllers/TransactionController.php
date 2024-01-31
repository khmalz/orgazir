<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view("transaction.index", compact("products"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => ['required', 'string', 'json'],
            'item_total' => ['required', 'numeric'],
            'subtotal' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ]);

        $transaction = Transaction::create([
            'items' => json_decode($request->items, true),
            'item_total' => $request->item_total,
            'subtotal' => $request->subtotal,
            'discount' => $request->discount,
            'total' => $request->total,
        ]);

        return to_route('transaction.pdf', $transaction);
    }

    public function pdf(Transaction $transaction)
    {
        $pdf = Pdf::loadView('invoice.pdf', compact('transaction'));
        return $pdf->stream("invoice.pdf");
    }

    public function history()
    {
        return view("transaction.history");
    }
}
