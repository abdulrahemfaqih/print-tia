<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPendapatan = \App\Models\Transaksi::sum(\DB::raw('lembar * 250'));
        return [
            Stat::make('Total Pendapatan', 'Rp.' . $totalPendapatan, 'text-green-600', 'heroicon-o-cash'),
        ];
    }
}
