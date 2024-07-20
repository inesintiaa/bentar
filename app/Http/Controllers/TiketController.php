<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tikets = Tiket::with(['konser'])->paginate(10);
        return view('tiket.index', compact('tikets'));
    }
    public function edit(string $id)
    {
        $tiket = Tiket::with('konser')->findOrFail($id);
        return view('tiket.edit', compact('tiket'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|in:Gold,Silver,Bronze',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $tiket = Tiket::findOrFail($id);
        $tiket->category = $request->input('category');
        $tiket->price = $request->input('price');
        $tiket->quantity = $request->input('quantity');
        // dd($request);
        $tiket->save();

        return redirect()->route('admin.tiket')->with('success', 'Tiket Berhasil diupdate.');
    }
}
