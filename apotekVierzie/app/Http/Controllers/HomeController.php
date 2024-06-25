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
        $data['obat'] = Obat::count();
        $data['stok'] = Stok::count();
        $data['riwayat'] = Riwayat::count();
        return view('dashboard.index', compact('data'));
    }
}
