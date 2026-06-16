<?php

namespace App\Filament\Resources\ClaimRequests\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Models\ItemReceipt;

class ClaimRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table

            ->defaultSort('id', 'desc')

            ->columns([

                Tables\Columns\TextColumn::make('foundItem.item_name')
                    ->label('Barang')
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('User'),

                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('No HP'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'Pending',
                        'success' => 'Approved',
                        'danger' => 'Rejected',
                    ]),

                Tables\Columns\ImageColumn::make('foundItem.photo')
                    ->label('Foto')
                    ->disk('public')
                    ->visibility('public')
                    ->width(80),
            ])

            ->recordActions([

                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-m-check')
                    ->visible(fn($record) => $record->status === 'Pending')

                    ->action(function ($record) {

                        ItemReceipt::create([
                            'found_item_id' => $record->found_item_id,
                            'receiver_name' => $record->user->name,
                            'receiver_at' => now(),
                            'notes' => 'Klaim disetujui admin',
                        ]);

                        $record->update([
                            'status' => 'Approved',
                        ]);

                        $record->foundItem->update([
                            'status' => 'Sudah Diambil',
                        ]);
                    }),

                Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->icon('heroicon-m-x-mark')
                    ->visible(fn($record) => $record->status === 'Pending')

                    ->action(function ($record) {

                        $record->update([
                            'status' => 'Rejected',
                        ]);
                    }),

            ]);
    }
}
