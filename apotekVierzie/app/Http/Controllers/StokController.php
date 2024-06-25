<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = Stok::all();
        $obat = Obat::all();
        return view('stok.index')->with('stok', $stok, 'obat', $obat);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obat = Obat::orderBy('nama_obat', 'ASC')->get();
        return view('stok.create')->with('obat', $obat);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'obat_id' => 'required',
            'jumlah_masuk' => 'required',
            'jumlah_keluar' => 'required',
            'tanggal_transaksi' => 'required',
        ]);

        $stok = new Stok();
        $stok->obat_id = $validasi['obat_id'];
        $stok->jumlah_masuk = $validasi['jumlah_masuk'];
        $stok->jumlah_keluar = $validasi['jumlah_keluar'];
        $stok->tanggal_transaksi = $validasi['tanggal_transaksi'];

        $stok->save();
        return redirect()->route('stok.index')->with('success', "data stok obat ".$validasi['obat_id']." berhasil disimpan");

    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        $obat = Obat::orderBy('nama_obat', 'ASC')->get();
        return view('stok.edit')->with('obat',$obat)->with('stok',$stok);
        $stok = Stok::all();
        $obat = Obat::all();

        return view('stok.edit')->with('stok', $stok, 'obat', $obat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $stok = Stok::find($id);
        $stok->obat_id = $request->obat_id;
        $stok->jumlah_masuk = $request->jumlah_masuk;
        $stok->jumlah_keluar = $request->jumlah_keluar;
        $stok->tanggal_transaksi = $request->tanggal_transaksi;
        $stok->save();
        return redirect()->route('stok.index')->with('success', "Data stok  berhasil diupdate");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok, Request $request)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Data berhasil di delete');

    }
}
