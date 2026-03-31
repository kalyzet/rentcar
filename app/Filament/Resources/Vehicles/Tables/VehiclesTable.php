<?php

namespace App\Filament\Resources\Vehicles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class VehiclesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->getStateUsing(fn($record) => $record->foto ? asset('storage/' . $record->foto) : null)
                    ->height(70),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->description(fn($record) => $record->plat_nomor)
                    ->weight('medium'),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(40),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'tersedia',
                        'warning' => 'disewa',
                        'danger' => 'maintenance',
                    ]),

                Tables\Columns\TextColumn::make('harga_per_hari')
                    ->money('IDR')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
