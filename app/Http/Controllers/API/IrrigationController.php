<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SmartIrrigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IrrigationController extends Controller
{
    /**
     * 1. GET API: Mengambil semua data dari database
     * Fitur ini nanti dipakai untuk nampilin Tabel Riwayat dan Grafik di Dashboard Web.
     */
    public function index()
    {
        $data = SmartIrrigation::orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data riwayat irigasi berhasil diambil',
            'data' => $data
        ], 200);
    }

    /**
     * 2. POST API: Menerima input data sensor, hitung logika ML, lalu simpan ke DB.
     * Fitur ini dipakai pas kita submit Form input data sensor baru di Web.
     */
    public function store(Request $request)
    {
        // Validasi input data form biar gak kosongan atau salah ketik teks
        $validator = Validator::make($request->all(), [
            'soil_moisture' => 'required|numeric',
            'ambient_temperature' => 'required|numeric',
            'atmospheric_humidity' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors()
            ], 400);
        }

        // Ambil data riof dari request
        $soil = $request->soil_moisture;
        $temp = $request->ambient_temperature;
        $hum = $request->atmospheric_humidity;

        // ========================================================
        // ATURAN EKSTRAKSI LOGIKA K-MEANS (Berdasarkan Centroid Lo)
        // ========================================================
        $cluster_zone = 0; 

        if ($soil > 700) {
            $cluster_zone = 3; // Zona Kritis (Tanah Kering & Butuh Air, Rerata Hambatan ~868 Ohm)
        } elseif ($temp < 28) {
            $cluster_zone = 2; // Zona Sejuk / Malam (Rerata Suhu ~25.5°C)
        } elseif ($hum > 50) {
            $cluster_zone = 1; // Zona Lembap Tropis (Rerata Kelembapan Udara ~57.3%)
        } else {
            $cluster_zone = 0; // Zona Kering Udara (Rerata Kelembapan Udara ~31.7%)
        }

        // ========================================================
        // ATURAN EKSTRAKSI LOGIKA ANN (Status Pompa Biner)
        // ========================================================
        $dc_pump_status = 0; // Default: Pompa Mati (0)

        // Pompa Otomatis MENYALA (1) jika Lahan Kritis (Klaster 3) ATAU Suhu Udara Terlalu Ekstrem Panas
        if ($cluster_zone == 3 || ($temp > 33 && $cluster_zone == 0)) {
            $dc_pump_status = 1; 
        }

        // Simpan data asli + hasil kalkulasi cerdas ke MySQL via Model
        $irrigation = SmartIrrigation::create([
            'soil_moisture' => $soil,
            'ambient_temperature' => $temp,
            'atmospheric_humidity' => $hum,
            'cluster_zone' => $cluster_zone,
            'dc_pump_status' => $dc_pump_status,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data sensor berhasil diproses oleh model K-Means & ANN!',
            'data' => $irrigation
        ], 201);
    }
}