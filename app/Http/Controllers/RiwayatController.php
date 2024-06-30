<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\Obat;
use App\Models\Stok;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::with('obat', 'stok')->latest()->get();
        return view('riwayat.index', compact('riwayat'));
    }

    public function create()
    {
        $obat = Obat::all();
        $stok = Stok::all();
        return view('riwayat.create', compact('obat', 'stok'));
    }

    public function store(Request $request)
    {
        $riwayat = new Riwayat();
        $riwayat->obat_id = $request->obat_id;
        $riwayat->stok_id = $request->stok_id;
        $riwayat->jumlah = $request->jumlah;
        $riwayat->jenis_transaksi = $request->jenis_transaksi;
        $riwayat->tanggal = $request->tanggal;

        if($riwayat->jenis_transaksi == 'keluar') {
            // Decrease stok
            $stok = Stok::find($riwayat->stok_id);
            $stok->jumlah_obat -= $riwayat->jumlah;
            $stok->save();
        } else {
            // Increase stok
            $stok = Stok::find($riwayat->stok_id);
            $stok->jumlah_obat += $riwayat->jumlah;
            $stok->save();
        }

        $riwayat->save();

        return redirect('/riwayat')->with('success', 'Transaction saved successfully');
    }
}
