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
        $data['riwayat'] = Riwayat::where('jenis_transaksi', 'Keluar')->count();

        $graph = Riwayat::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('count(id) as total')
        )
            ->groupBy('bulan')
            ->get();

        foreach ($graph as $item) {
            $item->bulan = date('F', mktime(0, 0, 0, $item->bulan, 1));
        }
        return view('dashboard.index', compact('data', 'graph'));
    }
}
