<?php

namespace App\Filament\Widgets;

use App\Models\Vehicle;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VehicleStats extends StatsOverviewWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'half';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Kendaraan', Vehicle::count())
                ->description('Semua kendaraan')
                ->url(url('/admin/vehicles'))
                ->color('primary'),

            Stat::make('Tersedia', Vehicle::where('status', 'tersedia')->count())
                ->color('success'),

            Stat::make('Disewa', Vehicle::where('status', 'disewa')->count())
                ->color('warning'),

            Stat::make('Maintenance', Vehicle::where('status', 'maintenance')->count())
                ->color('danger'),
        ];
    }
}
