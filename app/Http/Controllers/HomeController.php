<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Riwayat;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['obat'] = Obat::count();
        $data['stok'] = Stok::count();
        $data['riwayat'] = Riwayat::where('jenis_transaksi', 'masuk')->count();

        $orderCounts = Riwayat::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        return view('dashboard.index', compact('data', 'orderCounts'));
    }
}
