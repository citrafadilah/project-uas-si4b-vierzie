<?php

namespace App\Http\Controllers\API;
use App\Models\Obat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return response()->json($obat, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'manfaat' => 'required',
            'efek_samping' => 'required',
        ]);

        $obat = Obat::create($validasi);
        if($obat)
        {
            $response['success'] = true;
            $response['message'] = "Data obat " . $validasi['nama_obat'] . " berhasil disimpan";
            return response()->json($response, Response::HTTP_CREATED);
        }
    }


}
