<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $transaksis = Transaksi::with(['users'])->paginate(10);
        return view('transaksi.index', compact('transaksis'));
    }
    public function create()
    {
        $peserta = User::all();
        $tiket = Tiket::with(['konser'])->get();
        return view('transaksi.create', compact('peserta', 'tiket'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'peserta_id' => 'required|exists:users,id',
            'tiket_id' => 'required|exists:tikets,id',
            'quantity' => 'required|integer|min:1|max:10',
            'sub_total' => 'required|numeric',
        ]);

        $pesertaId = $request->input('peserta_id');
        $tiketId = $request->input('tiket_id');
        $quantity = $request->input('quantity');

        $userTicketQuantity = Riwayat::whereHas('transaksi', function ($query) use ($pesertaId) {
            $query->where('peserta_id', $pesertaId);
        })->where('tiket_id', $tiketId)->sum('quantity');

        if ($userTicketQuantity + $quantity > 10) {
            return redirect()->back()->withErrors(['msg' => 'Anda hanya dapat membeli 10 tiket per kategori tiket.']);
        }

        $tiket = Tiket::findOrFail($tiketId);

        if ($tiket->quantity < $quantity) {
            return redirect()->back()->withErrors(['msg' => 'Maaf stok tiket tidak mencukupi.']);
        }

        $tiket->quantity -= $quantity;
        $tiket->save();

        $totalAmount = $tiket->price * $quantity;

        $transaksi = Transaksi::create([
            'peserta_id' => $pesertaId,
            'total_amount' => $totalAmount,
            'transaction_date' => now(),
        ]);

        Riwayat::create([
            'transaksi_id' => $transaksi->id,
            'tiket_id' => $tiketId,
            'quantity' => $quantity,
            'subtotal' => $totalAmount,
        ]);

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil dibuat.');
    }
    public function edit(string $id)
    {
        $transaksi = Transaksi::with('riwayats')->findOrFail($id);
        $tiket = Tiket::all();
        $peserta = User::all();
        // dd($transaksi);
        return view('transaksi.edit', compact('transaksi', 'tiket', 'peserta'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'peserta_id' => 'required|exists:users,id',
            'tiket_id' => 'required|exists:tikets,id',
            'quantity' => 'required|integer|min:1|max:10',
            'sub_total' => 'required|numeric',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $pesertaId = $request->input('peserta_id');
        $tiketId = $request->input('tiket_id');
        $quantity = $request->input('quantity');

        foreach ($transaksi->riwayats as $riwayat) {
            $tiketModel = Tiket::findOrFail($riwayat->tiket_id);
            $tiketModel->quantity += $riwayat->quantity;
            $tiketModel->save();
        }

        Riwayat::where('transaksi_id', $id)->delete();

        $userTicketQuantity = Riwayat::whereHas('transaksi', function ($query) use ($pesertaId) {
            $query->where('peserta_id', $pesertaId);
        })->where('tiket_id', $tiketId)->sum('quantity');

        if ($userTicketQuantity + $quantity > 10) {
            return redirect()->back()->withErrors(['msg' => 'Anda hanya dapat membeli 10 tiket per kategori tiket.']);
        }

        $tiket = Tiket::findOrFail($tiketId);

        if ($tiket->quantity < $quantity) {
            return redirect()->back()->withErrors(['msg' => 'Maaf stok tiket tidak mencukupi.']);
        }

        $tiket->quantity -= $quantity;
        $tiket->save();

        $totalAmount = $tiket->price * $quantity;

        $transaksi->update([
            'peserta_id' => $pesertaId,
            'total_amount' => $totalAmount,
        ]);

        Riwayat::create([
            'transaksi_id' => $transaksi->id,
            'tiket_id' => $tiketId,
            'quantity' => $quantity,
            'subtotal' => $totalAmount,
        ]);

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        foreach ($transaksi->riwayats as $riwayat) {
            $tiketModel = Tiket::findOrFail($riwayat->tiket_id);
            $tiketModel->quantity += $riwayat->quantity;
            $tiketModel->save();
        }

        $transaksi->delete();

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }
}
