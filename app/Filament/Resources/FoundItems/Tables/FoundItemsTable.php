<?php

namespace App\Filament\Resources\FoundItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class FoundItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('found_at', 'desc')
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
                ImageColumn::make('photo')
                    ->label('Foto')
                    ->disk('public')
                    ->visibility('public')
                    ->width(80),
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
