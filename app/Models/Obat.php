<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = "obats";
    use HasFactory;

    public function stok()
    {
        return $this->hasMany(Stok::class, 'obat_id');
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'obat_id');
    }
}
