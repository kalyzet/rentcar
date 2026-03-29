<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('kode_booking')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama_penyewa')
                    ->searchable(),

                Tables\Columns\TextColumn::make('vehicle.nama')
                    ->label('Kendaraan'),

                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date(),

                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date(),

                Tables\Columns\TextColumn::make('total_harga')
                    ->money('IDR'),

                Tables\Columns\BadgeColumn::make('status_booking')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'aktif',
                        'gray' => 'selesai',
                        'danger' => 'dibatalkan',
                    ]),

                Tables\Columns\BadgeColumn::make('status_pembayaran')
                    ->colors([
                        'danger' => 'belum_bayar',
                        'warning' => 'dp',
                        'success' => 'lunas',
                    ]),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
