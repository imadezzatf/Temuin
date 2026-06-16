<?php

namespace App\Filament\Resources\ItemReceipts;

use App\Filament\Resources\ItemReceipts\Pages\CreateItemReceipt;
use App\Filament\Resources\ItemReceipts\Pages\EditItemReceipt;
use App\Filament\Resources\ItemReceipts\Pages\ListItemReceipts;
use App\Filament\Resources\ItemReceipts\Schemas\ItemReceiptForm;
use App\Filament\Resources\ItemReceipts\Tables\ItemReceiptsTable;
use App\Models\ItemReceipt;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ItemReceiptResource extends Resource
{
    protected static ?string $model = ItemReceipt::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInboxStack; // Ikon tumpukan kotak masuk untuk menggambarkan penerimaan barang

    protected static ?string $recordTitleAttribute = 'receiver_name';

    protected static ?string $navigationLabel = 'Pengambilan Barang';

    public static function form(Schema $schema): Schema
    {
        return ItemReceiptForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ItemReceiptsTable::configure($table);
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
            'index' => ListItemReceipts::route('/'),
            'create' => CreateItemReceipt::route('/create'),
            'edit' => EditItemReceipt::route('/{record}/edit'),
        ];
    }
}
