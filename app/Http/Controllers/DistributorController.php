<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distributor = Distributor::all();
        return view('distributor.index', compact('distributor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distributor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'noHp' => 'required',
        'email' => 'required|email',
    ]);

    Distributor::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'noHp' => $request->noHp,
        'email' => $request->email,
        'status' => '-',
    ]);

    return redirect()->route('distributor.create')->with('success', 'Distributor berhasil ditambahkan.');
}

    public function update(Request $request, $id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());

        return redirect()->route('distributor.index')->with('success', 'Data distributor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil dihapus.');
    }

    public function sendRequest(Request $request, $id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->update([
            'catatan' => $request->catatan,
            'status' => 'sedang diproses'
        ]);

        return redirect()->route('distributor.index')->with('success', 'Permintaan untuk distributor berhasil dikirim.');
    }

    public function markAsArrived($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->update(['status' => '-']);

        return redirect()->route('distributor.index')->with('success', 'Status distributor berhasil diupdate.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
}
