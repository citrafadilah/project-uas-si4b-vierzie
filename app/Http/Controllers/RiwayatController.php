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
        if(auth()->user()->role != 'A') {
            abort(403);
        }

        $obat = Obat::all();
        $stok = Stok::where('tanggal_kadaluarsa', '>', date('Y-m-d'))->get();
        return view('riwayat.create', compact('obat', 'stok'));
    }

    public function store(Request $request)
    {

      if(auth()->user()->role != 'A') {
         abort(403);
      }

      $riwayat = new Riwayat();

      $riwayat->obat_id = $request->obat_id;
      $riwayat->stok_id = $request->stok_id;
      $riwayat->jumlah = $request->jumlah;
      $riwayat->jenis_transaksi = $request->jenis_transaksi;
      $riwayat->tanggal = $request->tanggal;

      // Check stock
      $stok = Stok::find($riwayat->stok_id);

      if($riwayat->jumlah > $stok->jumlah_obat) {
        return back()->withErrors('Jumlah tidak bisa lebih dari stok obat');
      }

      if($riwayat->jenis_transaksi == 'keluar') {

         // Decrease stok
         $stok->jumlah_obat -= $riwayat->jumlah;
         $stok->save();

      } else {

         // Increase stok
         $stok->jumlah_obat += $riwayat->jumlah;
         $stok->save();

      }

      if($riwayat->save()) {

         return redirect('/riwayat')->with('success', 'Transaction saved successfully');

      } else {

         return back()->withErrors($riwayat->errors());

      }

    }
    public function edit($id)
    {
        if(auth()->user()->role != 'A') {
            abort(403);
        }

        $riwayat = Riwayat::findOrFail($id);
        $obat = Obat::all();
        $stok = Stok::all();
        return view('riwayat.edit', compact('riwayat', 'obat', 'stok'));
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->role != 'A') {
            abort(403);
        }

        $riwayat = Riwayat::findOrFail($id);
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

        return redirect('/riwayat')->with('success', 'Transaction updated successfully');
    }

    public function destroy($id)
    {
        if(auth()->user()->role != 'A') {
            abort(403);
        }

        $riwayat = Riwayat::findOrFail($id);
        $riwayat->delete();

        return redirect('/riwayat')->with('success', 'Transaction deleted successfully');
    }
}
