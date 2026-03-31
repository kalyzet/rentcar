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
        $vehicles = Vehicle::orderBy('jenis', 'asc')->get();

        return view('index', compact('vehicles'));
    }
}
