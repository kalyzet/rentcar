<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Input Dasar
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'nama_penyewa' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi_tujuan' => 'required|string|max:255',
            'keperluan_sewa' => 'required|string|max:255',
        ]);

        // 2. Ambil Data Kendaraan & Hitung Harga
        $vehicle = Vehicle::findOrFail($request->vehicle_id);

        $tgl_mulai = Carbon::parse($request->tanggal_mulai);
        $tgl_selesai = Carbon::parse($request->tanggal_selesai);

        // Hitung selisih hari (minimal dihitung 1 hari kalau di hari yang sama)
        $selisih_hari = $tgl_mulai->diffInDays($tgl_selesai) == 0 ? 1 : $tgl_mulai->diffInDays($tgl_selesai);
        $total_harga = $selisih_hari * $vehicle->harga_per_hari;

        // 3. Generate Kode Booking Unik
        $kode_booking = 'RZYT-' . strtoupper(substr(uniqid(), -5));

        // 4. Simpan ke Database
        Booking::create([
            'kode_booking' => $kode_booking,
            'vehicle_id' => $vehicle->id,
            'nama_penyewa' => $request->nama_penyewa,
            'no_hp' => $request->no_hp,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi_tujuan' => $request->lokasi_tujuan,
            'keperluan_sewa' => $request->keperluan_sewa,
            'catatan' => $request->catatan,
            'total_harga' => $total_harga,
            'status_booking' => 'menunggu konfirmasi',
            'status_pembayaran' => 'belum bayar',
        ]);

        // 5. Susun Pesan WhatsApp
        $no_wa_admin = "6281234567890"; // Ganti dengan nomor WA aslimu
        $teks_wa = "Halo Admin Rentalyzet,\n\n";
        $teks_wa .= "Saya ingin menyewa kendaraan dengan detail berikut:\n";
        $teks_wa .= "Kode Booking: *" . $kode_booking . "*\n";
        $teks_wa .= "Nama: " . $request->nama_penyewa . "\n";
        $teks_wa .= "Kendaraan: " . $vehicle->nama . " (" . $vehicle->plat_nomor . ")\n";
        $teks_wa .= "Tanggal: " . $tgl_mulai->format('d M Y') . " s/d " . $tgl_selesai->format('d M Y') . " (" . $selisih_hari . " Hari)\n";
        $teks_wa .= "Tujuan: " . $request->lokasi_tujuan . "\n";
        $teks_wa .= "Total Estimasi: *Rp " . number_format($total_harga, 0, ',', '.') . "*\n\n";

        if ($request->catatan) {
            $teks_wa .= "Catatan: " . $request->catatan . "\n\n";
        }

        $teks_wa .= "Mohon info ketersediaan dan proses selanjutnya. Terima kasih.";

        // Encode teks agar aman dipakai di URL
        $url_wa = "https://wa.me/" . $no_wa_admin . "?text=" . urlencode($teks_wa);

        // 6. Redirect User langsung ke link WhatsApp
        return redirect()->away($url_wa);
    }
}
