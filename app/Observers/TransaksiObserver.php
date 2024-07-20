<?php

namespace App\Observers;

use App\Models\Tiket;
use App\Models\Transaksi;

class TransaksiObserver
{
    /**
     * Handle the Transaksi "created" event.
     */
    public function created(Transaksi $transaksi): void
    {
        foreach ($transaksi->riwayats as $riwayat) {
            $tiket = $riwayat->tiket;
            $tiket->quantity -= $riwayat->quantity;
            $tiket->save();
        }
    }

    /**
     * Handle the Transaksi "updated" event.
     */
    public function updated(Transaksi $transaksi): void
    {
        $originalRiwayats = $transaksi->getOriginal('riwayats');
        $updatedRiwayats = $transaksi->riwayats;

        foreach ($originalRiwayats as $originalRiwayat) {
            $tiket = Tiket::find($originalRiwayat['tiket_id']);
            $tiket->quantity += $originalRiwayat['quantity'];
            $tiket->save();
        }

        foreach ($updatedRiwayats as $updatedRiwayat) {
            $tiket = Tiket::find($updatedRiwayat['tiket_id']);
            if ($tiket->quantity < $updatedRiwayat['quantity']) {
                return redirect()->back()->withErrors(['msg' => 'Tiket tidak cukup']);
            }
            $tiket->quantity -= $updatedRiwayat['quantity'];
            $tiket->save();
        }
    }

    /**
     * Handle the Transaksi "deleted" event.
     */
    public function deleted(Transaksi $transaksi): void
    {
        foreach ($transaksi->riwayats as $riwayat) {
            $tiket = $riwayat->tiket;
            $tiket->quantity += $riwayat->quantity;
            $tiket->save();
        }
    }

    /**
     * Handle the Transaksi "restored" event.
     */
    public function restored(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "force deleted" event.
     */
    public function forceDeleted(Transaksi $transaksi): void
    {
        //
    }
}
