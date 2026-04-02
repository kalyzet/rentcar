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
        // Mengambil semua kendaraan, urutkan yang tersedia agar berada di atas
        $vehicles = Vehicle::orderByRaw("FIELD(status, 'tersedia', 'disewa', 'maintenance')")->get();

        return view('index', compact('vehicles'));
    }
}
