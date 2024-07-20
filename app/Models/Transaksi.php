<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'peserta_id',
        'total_amount',
        'transaction_date',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'peserta_id');
    }
    public function riwayats()
    {
        return $this->hasMany(Riwayat::class);
    }
}
