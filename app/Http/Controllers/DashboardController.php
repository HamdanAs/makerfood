<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $payload['item_count'] = Product::query()
            ->whereBelongsTo(Auth::user()->kitchen)
            ->count();

        $payload['transaction_count'] = Order::query()
            ->whereBelongsTo(Auth::user()->kitchen)
            ->count();

        $payload['transaction_sum'] = Order::query()
            ->whereBelongsTo(Auth::user()->kitchen)
            ->where('status', 5)
            ->sum('total');

        return view('app.dashboard', $payload);
    }
}
