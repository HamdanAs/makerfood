<?php

namespace App\Http\Controllers;

use App\Models\Kitchen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $kitchen = Kitchen::query()
            ->whereBelongsTo($user)
            ->first();

        return view('app.profile.index', compact('user', 'kitchen'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // dd($request->all());

        return back()->with('success', 'Profile berhasil diubah!');
    }

    public function updateKitchen(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $request->user()->kitchen()->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return back()->with('success', 'Profile dapur berhasil diubah!');
    }
}
