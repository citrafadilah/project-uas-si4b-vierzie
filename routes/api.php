<?php

use App\Http\Controllers\API\ObatController;
use App\Http\Controllers\API\RiwayatController;
use App\Http\Controllers\API\StokController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('obat',[ObatController::class, 'index']);
Route::post('obat',[ObatController::class, 'store']);
Route::get('obat/{obat}',[ObatController::class, 'show']);
Route::put('obat/{obat}',[ObatController::class, 'update']);
Route::delete('obat/{obat}',[ObatController::class, 'destroy']);
Route::get('stok',[StokController::class, 'index']);
Route::post('stok',[StokController::class, 'store']);
Route::get('stok/{stok}',[StokController::class, 'show']);
Route::put('stok/{stok}',[StokController::class, 'update']);
Route::delete('stok/{stok}',[StokController::class, 'destroy']);
Route::get('riwayat',[RIwayatController::class, 'index']);
Route::post('riwayat',[RIwayatController::class, 'store']);
Route::get('riwayat/{riwayat}',[RiwayatController::class, 'show']);
Route::put('riwayat/{riwayat}',[RiwayatController::class, 'update']);
Route::delete('riwayat/{riwayat}',[RiwayatController::class, 'destroy']);
