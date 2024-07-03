<?php

namespace App\Http\Controllers\API;
use App\Models\Riwayat;
use App\Http\Controllers\Controller;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RIwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::all();
        return response()->json($riwayat, Response::HTTP_OK);
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
        if($riwayat)
        {
            $response['success'] = true;
            $response['message'] = "Data riwayat " . $request->obat_id . " berhasil disimpan";
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function show(Riwayat $riwayat)
    {
        return response()->json($riwayat, Response::HTTP_OK);
    }

    public function update(Request $request, Riwayat $riwayat)
    {
        $riwayat->update($request->all());
        if($riwayat)
        {
            $response['success'] = true;
            $response['message'] = "Data riwayat " . $request->obat_id . " berhasil diupdate";
            return response()->json($response, Response::HTTP_OK);
        }
    }

    public function destroy(Riwayat $riwayat)
    {
        $riwayat->delete();
        $response['success'] = true;
        $response['message'] = "Data riwayat " . $riwayat->obat_id . " berhasil dihapus";
        return response()->json($response, Response::HTTP_OK);
    }

}
