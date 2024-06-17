<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::all();
        return view('obat.index')->with('obat', $obat);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'tanggal_dibuat' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
            'manfaat' => 'required',
            'efek_samping' => 'required',
        ]);

        $obat = new Obat();
        $obat->nama_obat = $validasi['nama_obat'];
        $obat->jenis_obat = $validasi['jenis_obat'];
        $obat->tanggal_dibuat = $validasi['tanggal_dibuat'];
        $obat->tanggal_kadaluarsa = $validasi['tanggal_kadaluarsa'];
        $obat->manfaat = $validasi['manfaat'];
        $obat->efek_samping = $validasi['efek_samping'];

        $obat->save();

        return redirect()->route('obat.index')->with('success', "Data obat " . $validasi['nama_obat'] . " berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        return view('obat.edit')->with('obat', $obat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $validasi = $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'tanggal_dibuat' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
            'manfaat' => 'required',
            'efek_samping' => 'required',
        ]);

        $obat = Obat::find($obat->id);
        $obat->nama_obat = $validasi['nama_obat'];
        $obat->jenis_obat = $validasi['jenis_obat'];
        $obat->tanggal_dibuat = $validasi['tanggal_dibuat'];
        $obat->tanggal_kadaluarsa = $validasi['tanggal_kadaluarsa'];
        $obat->manfaat = $validasi['manfaat'];
        $obat->efek_samping = $validasi['efek_samping'];
        
        $obat->save();

        return redirect()->route('obat.index')->with('success', "Data obat " . $validasi['nama_obat'] . " berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Data berhasil dihapus');
    }
}
