<?php

namespace App\Http\Controllers\API;
use App\Models\Stok;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::all();
        return response()->json($stok, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'obat_id' => 'required',
            'jumlah_obat' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);
        $stok = Stok::create($validasi);
        if($stok)
        {
            $response['success'] = true;
            $response['message'] = "Data stok " . $validasi['obat_id'] . " berhasil disimpan";
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function show(Stok $stok)
    {
        return response()->json($stok, Response::HTTP_OK);
    }

    public function update(Request $request, Stok $stok)
    {
        $validasi = $request->validate([
            'obat_id' => 'required',
            'jumlah_obat' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);
        $stok->update($validasi);
        if($stok)
        {
            $response['success'] = true;
            $response['message'] = "Data stok " . $validasi['obat_id'] . " berhasil diupdate";
            return response()->json($response, Response::HTTP_OK);
        }
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        $response['success'] = true;
        $response['message'] = "Data stok " . $stok->obat_id . " berhasil dihapus";
        return response()->json($response, Response::HTTP_OK);
    }
}
