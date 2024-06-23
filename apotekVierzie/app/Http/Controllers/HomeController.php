<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Riwayat;
use App\Models\Stok;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $obat['obat'] = Obat::all()->count();
        $stok['stok'] = Stok::all()->count();
        $riwayat['riwayat'] = Riwayat::all()->count();
        return redirect('dashboard');
    }
}
