<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class Pengeluaran extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $pengeluaran = \DB::table('pengeluarans')
            ->selectRaw('DATE(tanggal) as tanggal, SUM(harga) as total_harga')
            ->groupBy('tanggal')
            ->get();

        $labels = $pengeluaran->pluck('tanggal')->toArray();
        $data = $pengeluaran->pluck('total_harga')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
            [
                'label' => 'Pengeluaran',
                'data' => $data,
            ],
            ],
        ];

    }

    protected function getType(): string
    {
        return 'line';
    }
}
