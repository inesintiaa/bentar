<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'date',
        'start_time',
        'image',
    ];
    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
