<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $riwayats = Riwayat::with(['transaksi', 'tiket.konser'])->paginate(10);
        // dd($riwayats);
        return view('riwayat.index', compact('riwayats'));
    }
    public function create()
    {
        return view('riwayat.create');
    }
    public function edit(string $id)
    {
    }
    public function destroy(string $id)
    {
    }
    public function store(Request $request)
    {
    }
    public function update(Request $request, string $id)
    {
    }
}
