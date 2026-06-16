<?php

namespace App\Filament\Resources\ItemReceipts\Pages;

use App\Filament\Resources\ItemReceipts\ItemReceiptResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListItemReceipts extends ListRecords
{
    protected static string $resource = ItemReceiptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
