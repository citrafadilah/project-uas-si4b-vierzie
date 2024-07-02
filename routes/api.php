<?php

use App\Http\Controllers\API\ObatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('obat',[ObatController::class, 'index']);
Route::post('obat',[ObatController::class, 'store']);
