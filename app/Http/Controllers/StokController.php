<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
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
        $stok = Stok::where('tanggal_kadaluarsa', '>', date('Y-m-d'))->get();
        $distributor = Distributor::orderBy('nama', 'ASC')->get();
        $obat = Obat::all();
        return view('stok.index')->with('stok', $stok, 'obat', $obat, 'distributor', $distributor);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role != 'A') {
            abort(403);
        }

        $distributor = Distributor::orderBy('nama', 'ASC')->get();
        $obat = Obat::orderBy('nama_obat', 'ASC')->get();

        return view('stok.create')->with([
            'obat' => $obat,
            'distributor' => $distributor
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role != 'A') {
            abort(403);
        }

        $validasi = $request->validate([
            'obat_id' => 'required',
            'distributor_id' => 'required',
            'jumlah_obat' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        Stok::create($validasi);

        return redirect()->route('stok.index')->with('success', "data stok obat " . $validasi['obat_id'] . " berhasil disimpan");
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
        if (auth()->user()->role != 'A') {
            abort(403);
        }

        $obat = Obat::orderBy('nama_obat', 'ASC')->get();
        return view('stok.edit')->with('obat', $obat)->with('stok', $stok);
        // $stok = Stok::all();
        // $obat = Obat::all();

        // return view('stok.edit')->with('stok', $stok, 'obat', $obat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->role != 'A') {
            abort(403);
        }

        $stok = Stok::find($id);
        $stok->obat_id = $request->obat_id;
        $stok->jumlah_obat = $request->jumlah_obat;
        $stok->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $stok->save();
        return redirect()->route('stok.index')->with('success', "Data stok  berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok, Request $request)
    {
        if (auth()->user()->role != 'A') {
            abort(403);
        }

        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Data berhasil di delete');
    }
}
