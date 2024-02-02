<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->oldest('name')->paginate(10);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datas = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'standard_price' => ['required', 'integer', 'min:0'],
            'image' => ['required', 'file', 'image', 'max:2048'],
        ]);

        $imagePath = $request->file('image')->store('products');
        $datas['image'] = $imagePath;

        Product::create($datas);

        return to_route('product.index')->with('success', 'Produk berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('category');

        return view('product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $datas = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'standard_price' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'file', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($product->image);

            $imagePath = $request->file('image')->store('products');
        }

        $datas['image'] = $imagePath ?? $product->image;

        $product->update($datas);
        return to_route('product.index')->with('success', 'Produk berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);

        $product->delete();
        return to_route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
