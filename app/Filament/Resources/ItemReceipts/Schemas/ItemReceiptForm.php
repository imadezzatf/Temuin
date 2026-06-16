<?php

namespace App\Filament\Resources\ItemReceipts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use App\Models\FoundItem;

class ItemReceiptForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('found_item_id')
                    ->label('Barang')
                    ->options(
                        FoundItem::where('status', 'Tersedia')
                            ->pluck('item_name', 'id')
                    )
                    ->searchable()
                    ->required(),

                TextInput::make('receiver_name')
                    ->label('Nama Pengambil')
                    ->required(),

                DateTimePicker::make('receiver_at')
                    ->label('Tanggal Pengambilan')
                    ->default(now())
                    ->required(),

                Textarea::make('notes')
                    ->label('Catatan'),
            ]);
    }
}