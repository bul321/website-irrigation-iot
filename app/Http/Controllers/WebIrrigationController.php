<?php

namespace App\Http\Controllers;

use App\Models\SmartIrrigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebIrrigationController extends Controller
{
    // Menampilkan Dashboard Utama
    public function dashboard()
    {
        // ✅ Filter by user yang lagi login
        $allData = SmartIrrigation::where('user_id', Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->get();

        $latest = SmartIrrigation::where('user_id', Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->first();

        return view('dashboard', compact('allData', 'latest'));
    }

    // Menampilkan Halaman Form Input
    public function input()
    {
        return view('input');
    }

    // Menangani Submit Form Sensor
    public function store(Request $request)
    {
        $soil = $request->soil_moisture;
        $temp = $request->ambient_temperature;
        $hum  = $request->atmospheric_humidity;

        // Hitung K-Means
        $cluster_zone = 0;
        if ($soil > 700) {
            $cluster_zone = 3;
        } elseif ($temp < 28) {
            $cluster_zone = 2;
        } elseif ($hum > 50) {
            $cluster_zone = 1;
        }

        // Hitung ANN
        $dc_pump_status = ($cluster_zone == 3 || ($temp > 33 && $cluster_zone == 0)) ? 1 : 0;

        // ✅ Simpan dengan user_id
        SmartIrrigation::create([
            'user_id'              => Auth::id(),
            'soil_moisture'        => $soil,
            'ambient_temperature'  => $temp,
            'atmospheric_humidity' => $hum,
            'cluster_zone'         => $cluster_zone,
            'dc_pump_status'       => $dc_pump_status,
        ]);

        return redirect()->route('web.input')->with('success', 'Data Sensor sukses diproses ML dan Disimpan!');
    }

    // Menampilkan halaman edit berdasarkan ID
    public function edit($id)
    {
        // ✅ Pastikan data milik user yang login
        $data = SmartIrrigation::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        return view('edit', compact('data'));
    }

    // Memproses pembaruan data
    public function update(Request $request, $id)
    {
        // ✅ Pastikan data milik user yang login
        $data = SmartIrrigation::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $soil = $request->soil_moisture;
        $temp = $request->ambient_temperature;
        $hum  = $request->atmospheric_humidity;

        // Hitung ulang ML
        $cluster_zone = 0;
        if ($soil > 700) {
            $cluster_zone = 3;
        } elseif ($temp < 28) {
            $cluster_zone = 2;
        } elseif ($hum > 50) {
            $cluster_zone = 1;
        }

        $dc_pump_status = ($cluster_zone == 3 || ($temp > 33 && $cluster_zone == 0)) ? 1 : 0;

        $data->update([
            'soil_moisture'        => $soil,
            'ambient_temperature'  => $temp,
            'atmospheric_humidity' => $hum,
            'cluster_zone'         => $cluster_zone,
            'dc_pump_status'       => $dc_pump_status,
        ]);

        return redirect()->route('web.dashboard')->with('success', 'Data berhasil diperbarui!');
    }

    // Menghapus data
    public function destroy($id)
    {
        // ✅ Pastikan data milik user yang login
        $data = SmartIrrigation::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $data->delete();

        return redirect()->route('web.dashboard')->with('success', 'Data berhasil dihapus!');
    }
}