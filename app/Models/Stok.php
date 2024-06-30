<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = "stoks";
    use HasFactory;

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'stok_id');
    }
}
