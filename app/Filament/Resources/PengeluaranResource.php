<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengeluaranResource\Pages;
use App\Filament\Resources\PengeluaranResource\RelationManagers;
use App\Models\Pengeluaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengeluaranResource extends Resource
{
    protected static ?string $model = Pengeluaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralModelLabel = 'Pengeluaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([

                        //name
                        Forms\Components\DatePicker::make('tanggal')
                            ->label('Tanggal Pengeluaran')
                            ->placeholder('Tanggal Pengeluaran')
                            ->required(),

                        //description
                        Forms\Components\TextInput::make('keterangan')
                            ->label('Keterangan Pengeluaran')
                            ->placeholder('Keterangan Pengeluaran')
                            ->required(),

                        Forms\Components\TextInput::make('harga')
                            ->label('Harga Pengeluaran')
                            ->placeholder('Harga Pengeluaran')
                            ->required(),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')->searchable(),
                Tables\Columns\TextColumn::make('keterangan'),
                Tables\Columns\TextColumn::make('harga'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengeluarans::route('/'),
            'create' => Pages\CreatePengeluaran::route('/create'),
            'edit' => Pages\EditPengeluaran::route('/{record}/edit'),
        ];
    }
}
