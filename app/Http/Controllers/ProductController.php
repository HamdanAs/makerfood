<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('app.product.index', compact('products'));
    }

    public function create()
    {
        return view('app.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|file'
        ]);

        Product::create([
            'kitchen_id' => auth()->user()->kitchen->id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => 0,
            'availability' => false
        ]);

        return redirect()->route('product.index');
    }
}
