<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $carts = [];

        if (auth()->check()) {
            $carts = Cart::query()
                ->whereBelongsTo(Auth::user())
                ->with('product')
                ->get();
        }

        return view('app.home', compact('products', 'carts'));
    }
}
