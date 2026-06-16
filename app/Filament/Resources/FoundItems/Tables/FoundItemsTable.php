<?php

namespace App\Filament\Resources\FoundItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class FoundItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('item_name')
                    ->label('Barang')
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Kategori'),

                TextColumn::make('securityPost.name')
                    ->label('Pos Satpam'),

                TextColumn::make('status')
                    ->badge(),

                TextColumn::make('found_at')
                    ->dateTime('d M Y H:i'),
                TextColumn::make('tags.name')
                    ->label('Tag / Ciri')
                    ->badge()
                    ->separator(','),
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
