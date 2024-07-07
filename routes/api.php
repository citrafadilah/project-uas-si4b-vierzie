<?php

use App\Http\Controllers\API\DistributorController;
use App\Http\Controllers\API\ObatController;
use App\Http\Controllers\API\RiwayatController;
use App\Http\Controllers\API\StokController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('obat', function (Request $request) {
    return $request->obat();
})->middleware('auth:sanctum');

Route::get('distributor', function (Request $request) {
    return $request->distributor();
})->middleware('auth:sanctum');

Route::get('stok', function (Request $request) {
    return $request->stok();
})->middleware('auth:sanctum');

Route::get('riwayat', function (Request $request) {
    return $request->riwayat();
})->middleware('auth:sanctum');

Route::post('obat', function (Request $request) {
    return $request->obat();
})->middleware('auth:sanctum');

Route::post('distributor', function (Request $request) {
    return $request->distributor();
})->middleware('auth:sanctum');

Route::post('stok', function (Request $request) {
    return $request->stok();
})->middleware('auth:sanctum');

Route::post('riwayat', function (Request $request) {
    return $request->riwayat();
})->middleware('auth:sanctum');

Route::put('obat', function (Request $request) {
    return $request->obat();
})->middleware('auth:sanctum');

Route::put('distributor', function (Request $request) {
    return $request->distributor();
})->middleware('auth:sanctum');

Route::put('stok', function (Request $request) {
    return $request->stok();
})->middleware('auth:sanctum');

Route::put('riwayat', function (Request $request) {
    return $request->riwayat();
})->middleware('auth:sanctum');

Route::delete('obat', function (Request $request) {
    return $request->obat();
})->middleware('auth:sanctum');

Route::delete('distributor', function (Request $request) {
    return $request->distributor();
})->middleware('auth:sanctum');

Route::delete('stok', function (Request $request) {
    return $request->stok();
})->middleware('auth:sanctum');

Route::delete('riwayat', function (Request $request) {
    return $request->riwayat();
})->middleware('auth:sanctum');
