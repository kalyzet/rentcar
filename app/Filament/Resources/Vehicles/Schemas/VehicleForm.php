<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;

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
                    ->saveUploadedFileUsing(function ($file) {
                        return $file->store('vehicles', 'public');
                    })
                    ->getUploadedFileUsing(function (string $file): ?array {
                        if (!Storage::disk('public')->exists($file)) {
                            return null;
                        }

                        $fullPath = Storage::disk('public')->path($file);
                        $url = asset('storage/' . $file);

                        return [
                            'name' => basename($file),
                            'size' => Storage::disk('public')->size($file),
                            'type' => mime_content_type($fullPath) ?: 'image/jpeg',
                            'url'  => $url,
                        ];
                    })
                    ->nullable(),

            ]);
    }
}
