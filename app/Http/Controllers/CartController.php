<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::query()
            ->whereBelongsTo(Auth::user())
            ->with('product')
            ->get();

        $total = $carts->reduce(function ($acc, $cart) {
            return $acc + ($cart->product->price * $cart->qty);
        });

        return view('app.cart.index', compact('carts', 'total'));
    }

    public function checkout()
    {
        $carts = Cart::query()
            ->whereBelongsTo(Auth::user())
            ->with('product')
            ->get();

        $total = $carts->reduce(function ($acc, $cart) {
            return $acc + ($cart->product->price * $cart->qty);
        });

        return view('app.cart.checkout', compact('carts', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required'
        ]);

        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qty' => 1
        ]);

        return back();
    }
}
