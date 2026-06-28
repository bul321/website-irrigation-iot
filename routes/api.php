<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\IrrigationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Endpoint REST API untuk aplikasi irigasi pintar lo
Route::get('/irrigation', [IrrigationController::class, 'index']);   // Mengambil data tabel/dashboard
Route::post('/irrigation', [IrrigationController::class, 'store']); // Mengirim data sensor baru dari form