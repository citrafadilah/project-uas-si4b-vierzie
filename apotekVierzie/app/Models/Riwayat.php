<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayats';
    use HasFactory;

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }

}
