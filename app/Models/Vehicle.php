<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'plat_nomor',
        'harga_per_hari',
        'status',
        'deskripsi',
        'foto'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}