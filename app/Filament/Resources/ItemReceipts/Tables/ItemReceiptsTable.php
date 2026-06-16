<?php

namespace App\Filament\Resources\ItemReceipts\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class ItemReceiptsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('foundItem.item_name')
                    ->label('Barang'),

                TextColumn::make('receiver_name')
                    ->label('Pengambil'),

                TextColumn::make('receiver_at')
                    ->dateTime('d M Y H:i'),

                TextColumn::make('notes')
                    ->limit(30),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}