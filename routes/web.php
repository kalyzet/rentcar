<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/', [VehicleController::class, 'index'])
    ->name('katalog.index');
