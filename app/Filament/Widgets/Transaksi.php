<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class Transaksi extends ChartWidget
{
    protected function getData(): array
    {
        $data = DB::table('transaksis')
            ->select(DB::raw('DATE(tanggal) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->get();

        $labels = $data->pluck('date')->toArray();
        $values = $data->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Transaksi',
                    'data' => $values,
                ],
            ],
        ];
    }

    protected static ?string $heading = 'Grafik Transaksi Harian';

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],

            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
