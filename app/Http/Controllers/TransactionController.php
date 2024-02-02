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
        $datas = $request->validate([
            'items' => ['required', 'string', 'json'],
            'item_total' => ['required', 'numeric'],
            'subtotal' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'payment' => ['required', 'string'],
        ]);

        $datas['items'] = json_decode($datas['items'], true);

        $transaction = Transaction::create($datas);

        return to_route('transaction.pdf', $transaction);
        // return to_route('transaction.pay')->with('success', $transaction->code);
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
