<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Riwayat;
use App\Models\Stok;
use App\Models\User;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = Stok::all();
        $user = User::all();
        $riwayat = Riwayat::all();
        return view('riwayat.index')->with('riwayat', $riwayat, 'user', $user, 'stok', $stok );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $riwayat = Stok::all();
        $riwayat = User::all();
        $riwayat = Riwayat::orderBy('user_id', 'ASC')->get();
        return view('riwayat.create')->with('riwayat', $riwayat);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'user_id' => 'required',
            'obat_id' => 'required',
            'jumlah' => 'required',
            'tipe_transaksi' => 'required',
            'tanggal_transaksi' => 'required',
        ]);

        $riwayat = new Riwayat();
        $riwayat->user_id = $validasi['user_id'];
        $riwayat->obat_id = $validasi['obat_id'];
        $riwayat->jumlah = $validasi['jumlah'];
        $riwayat->tipe_transaksi = $validasi['tipe_transaksi'];
        $riwayat->tangal_transaksi = $validasi['tanggal_transaksi'];
        $riwayat->save();

        return redirect()->route('riwayat.index')->with('success', "data Riwayat ".$validasi['user_id']." berhasil disimpan");

    }

    /**
     * Display the specified resource.
     */
    public function show(Riwayat $riwayat)
    {
        return view('riwayat.show', compact('riwayat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Riwayat $riwayat)
    {
        $obat = Obat::all();
        $stok = Stok::all();
        return view('riwayat.edit', compact('riwayat', 'obat', 'stok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Riwayat $riwayat)
    {
        $request->validate([
            'obat_id' => 'required|exists:obat,id',
            'stok_id' => 'required|exists:stok,id',
        ]);

        $riwayat->update($request->all());

        return redirect()->route('riwayat.index')
                         ->with('success', 'Riwayat updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riwayat $riwayat)
    {
        $riwayat->delete();

        return redirect()->route('riwayat.index')
                         ->with('success', 'Riwayat deleted successfully.');
    }
}
