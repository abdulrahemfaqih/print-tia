<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use App\Filament\Resources\TransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransaksis extends ListRecords
{
    protected static string $resource = TransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\CreateAction::make(),
            ExportAction::make()
                ->exports([
                    ExcelExport::make()
                        ->fromTable()
                        ->withFilename('transaksi print tia')
                        ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                        ->withColumns([
                            Column::make('tanggal'),
                            Column::make('lembar'),
                            Column::make('Total Harga', fn($row) => $row->lembar * 250)
                        ])
                ]),

        ];
    }
}
