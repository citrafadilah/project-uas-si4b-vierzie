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

        $incoming = Riwayat::where('jenis_transaksi', 'masuk')->get();
        $outgoing = Riwayat::where('jenis_transaksi', 'keluar')->get();
        return view('dashboard.index', [
            'data' => $data,
            'incoming' => $incoming,
            'outgoing' => $outgoing
        ]);
    }

}
