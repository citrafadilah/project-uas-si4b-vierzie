<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = "stoks";
    use HasFactory,HasUuids;
    public function obat(){
        return $this->belongsTo(Obat::class, 'obat_id');
}
}
