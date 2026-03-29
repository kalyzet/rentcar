<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Menampilkan halaman katalog utama untuk user.
     */
    public function index()
    {
        // MVP: Ambil hanya kendaraan yang siap disewa
        $vehicles = Vehicle::where('status', 'tersedia')
            ->orderBy('jenis', 'asc') // Urutkan motor dulu/mobil dulu bebas
            ->get();

        return view('index', compact('vehicles'));
    }
}
