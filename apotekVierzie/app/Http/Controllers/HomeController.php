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
        $data['obat'] = Obat::all()->count();
        $data['stok'] = Stok::all()->count();
        $data['riwayat'] = Riwayat::all()->count();
        return redirect('dashboard');
    }
}
