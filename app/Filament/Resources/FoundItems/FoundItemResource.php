<?php

namespace App\Filament\Resources\FoundItems;

use App\Filament\Resources\FoundItems\Pages\CreateFoundItem;
use App\Filament\Resources\FoundItems\Pages\EditFoundItem;
use App\Filament\Resources\FoundItems\Pages\ListFoundItems;
use App\Filament\Resources\FoundItems\Schemas\FoundItemForm;
use App\Filament\Resources\FoundItems\Tables\FoundItemsTable;
use App\Models\FoundItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FoundItemResource extends Resource
{
    protected static ?string $model = FoundItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMagnifyingGlass; // Ikon kaca pembesar untuk menggambarkan pencarian barang temuan

    protected static ?string $recordTitleAttribute = 'item_name';

    protected static ?string $navigationLabel = 'Barang Temuan';

    public static function form(Schema $schema): Schema
    {
        return FoundItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FoundItemsTable::configure($table);
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
            'index' => ListFoundItems::route('/'),
            'create' => CreateFoundItem::route('/create'),
            'edit' => EditFoundItem::route('/{record}/edit'),
        ];
    }
}
