<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = "stoks";

    protected $fillable = [
        'obat_id',
        'distributor_id',
        'jumlah_obat',
        'tanggal_kadaluarsa',
    ];
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'stok_id');
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'distributor_id');
    }
}
