<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class VehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nama')
                    ->label('Nama Kendaraan')
                    ->required(),

                TextInput::make('jenis')
                    ->required(),

                TextInput::make('plat_nomor')
                    ->label('Plat Nomor')
                    ->required(),

                TextInput::make('harga_per_hari')
                    ->label('Harga per Hari')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                Select::make('status')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'disewa' => 'Disewa',
                        'maintenance' => 'Maintenance',
                    ])
                    ->default('tersedia')
                    ->required(),

                Textarea::make('deskripsi')
                    ->rows(3)
                    ->columnSpanFull(),

                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('vehicles')
                    ->visibility('public')
                    ->imagePreviewHeight('120')
                    ->saveUploadedFileUsing(fn($file) => $file->store('vehicles', 'public'))
                    ->nullable(),

            ]);
    }
}
