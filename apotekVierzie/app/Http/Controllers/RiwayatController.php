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
        $model = Obat::all();
        $model = Stok::all();
        $model = User::all();
        $model = Riwayat::all();
        return view('riwayat.index')->with('model', $model);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obat = Obat::all();
        $stok = Stok::all();
        return view('riwayat.create', compact('obat', 'stok'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obat,id',
            'stok_id' => 'required|exists:stok,id',
        ]);

        Riwayat::create($request->all());

        return redirect()->route('riwayat.index')
                         ->with('success', 'Riwayat created successfully.');

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
