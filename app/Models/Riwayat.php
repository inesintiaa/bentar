<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaksi_id',
        'tiket_id',
        'quantity',
        'subtotal',
    ];
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}
