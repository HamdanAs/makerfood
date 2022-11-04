<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function history()
    {
        $orders = Order::query()
            ->whereBelongsTo(Auth::user(), 'customer')
            ->get();

        return view('app.order.history', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'delivery_method' => 'required',
            'payment_method' => 'required',
            'total' => 'required'
        ]);

        $carts = Cart::query()
            ->whereBelongsTo(Auth::user())
            ->with('product');

        $order = Order::create(
            $request->only('name', 'address', 'delivery_method', 'payment_method', 'total')
            + ['customer_id' => Auth::user()->id, 'kitchen_id' => $carts->first()->product->kitchen_id]
        );

        $carts->get()->each(function (Cart $cart) use ($order) {
            $order->details()->create([
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'subtotal' => $cart->product->price * $cart->qty
            ]);
        });

        $carts->delete();

        return redirect('/');
    }
}
