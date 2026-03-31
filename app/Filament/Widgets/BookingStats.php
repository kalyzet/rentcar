<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingStats extends StatsOverviewWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'half';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Booking', Booking::count())
                ->description('Semua booking')
                ->url(url('/admin/bookings'))
                ->color('primary'),

            Stat::make('Menunggu Konfirmasi', Booking::where('status_booking', 'menunggu konfirmasi')->count())
                ->color('warning'),

            Stat::make('Dikonfirmasi', Booking::where('status_booking', 'dikonfirmasi')->count())
                ->color('info'),

            Stat::make('Selesai', Booking::where('status_booking', 'selesai')->count())
                ->color('success'),

            Stat::make('Dibatalkan', Booking::where('status_booking', 'dibatalkan')->count())
                ->color('danger'),
        ];
    }
}
