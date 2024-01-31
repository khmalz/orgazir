<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

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

        return $transaction;
    }

    public function history()
    {
        return view("transaction.history");
    }
}
