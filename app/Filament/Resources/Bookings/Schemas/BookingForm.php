<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('kode_booking')
                    ->required(),

                TextInput::make('nama_penyewa')
                    ->required(),

                TextInput::make('no_hp')
                    ->tel()
                    ->required(),

                Select::make('vehicle_id')
                    ->relationship('vehicle', 'nama')
                    ->searchable()
                    ->required(),

                DatePicker::make('tanggal_mulai')
                    ->required(),

                DatePicker::make('tanggal_selesai')
                    ->required(),

                TextInput::make('lokasi_tujuan')
                    ->required(),

                TextInput::make('keperluan_sewa'),

                Textarea::make('catatan')
                    ->columnSpanFull(),

                TextInput::make('total_harga')
                    ->numeric()
                    ->prefix('Rp'),

                Select::make('status_booking')
                    ->options([
                        'pending' => 'Pending',
                        'aktif' => 'Aktif',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->default('pending'),

                Select::make('status_pembayaran')
                    ->options([
                        'belum_bayar' => 'Belum Bayar',
                        'dp' => 'DP',
                        'lunas' => 'Lunas',
                    ])
                    ->default('belum_bayar'),

            ]);
    }
}
