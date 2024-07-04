<?php

namespace App\Http\Controllers\API;
use App\Models\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributor = Distributor::all();
        return response()->json([
            'status' => 'success',
            'data' => $distributor
        ]);
    }

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

        return response()->json([
            'status' => 'success',
            'message' => 'Distributor berhasil ditambahkan.'
        ]);
    }
}
