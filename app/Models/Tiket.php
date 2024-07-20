<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $fillable = [
        'konser_id',
        'category',
        'price',
        'quantity',
    ];
    public function konser()
    {
        return $this->belongsTo(Konser::class);
    }
    public function riwayats()
    {
        return $this->hasMany(Riwayat::class);
    }
}
