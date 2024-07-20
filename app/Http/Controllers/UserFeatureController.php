<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Riwayat;
use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function konser()
    {
        $konser = Konser::paginate(10);
        return view('user.konser', compact('konser'));
    }
    public function konsershow(string $id)
    {
        $konser = Konser::findOrFail($id);
        $tiket = Tiket::with(['konser'])->where('konser_id', $id)->get();
        return view('user.konser-detail', compact('konser', 'tiket'));
    }
    public function riwayat()
    {
        $pesertaId = Auth::id();
        $riwayat = Riwayat::with(['transaksi', 'tiket.konser'])
            ->whereHas('transaksi', function ($query) use ($pesertaId) {
                $query->where('peserta_id', $pesertaId);
            })
            ->paginate(10);

        return view('user.riwayat', compact('riwayat'));
    }
    public function buytiket(Request $request)
    {
        $request->validate([
            'tiket_id' => 'required|exists:tikets,id',
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $pesertaId = Auth::id();
        $tiketId = $request->input('tiket_id');
        $quantity = $request->input('quantity');

        $userTicketQuantity = Riwayat::whereHas('transaksi', function ($query) use ($pesertaId) {
            $query->where('peserta_id', $pesertaId);
        })->where('tiket_id', $tiketId)->sum('quantity');

        if ($userTicketQuantity + $quantity > 10) {
            return redirect()->route('user.konser')->withErrors(['msg' => 'Anda hanya dapat membeli 10 tiket per kategori tiket.']);
        }

        $tiket = Tiket::findOrFail($tiketId);

        if ($tiket->quantity < $quantity) {
            return redirect()->route('user.konser')->withErrors(['msg' => 'Maaf stok tiket tidak mencukupi.']);
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

        return redirect()->route('user.konser')->with('success', 'Transaksi berhasil dibuat.');
    }
}
