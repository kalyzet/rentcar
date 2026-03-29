<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'kode_booking',
        'nama_penyewa',
        'no_hp',
        'vehicle_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi_tujuan',
        'keperluan_sewa',
        'catatan',
        'total_harga',
        'status_booking',
        'status_pembayaran'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
