<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->whereBelongsTo(Auth::user(), 'kitchen')
            ->get();

        return view('app.transaction.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);

        return view('app.transaction.show', compact('order'));
    }

    public function process(Order $order)
    {
        $this->authorize('update', $order);

        if ($order->delivery_method == 2) {
            $order->update(['status' => 4]);
        } else {
            $order->update(['status' => 2]);
        }

        return back();
    }

    public function send(Order $order)
    {
        $this->authorize('update', $order);

        $order->update(['status' => 3]);

        return back();
    }

    public function done(Order $order)
    {
        $this->authorize('update', $order);

        $order->update(['status' => 5]);

        return back();
    }

    public function submit(Order $order)
    {
        $this->authorize('update', $order);

        $order->update(['status' => 5]);

        return back();
    }

    public function decline(Order $order)
    {
        $this->authorize('update', $order);

        $order->update(['status' => 6]);

        return back();
    }
}
