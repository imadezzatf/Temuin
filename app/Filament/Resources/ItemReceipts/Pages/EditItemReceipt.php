<?php

namespace App\Filament\Resources\ItemReceipts\Pages;

use App\Filament\Resources\ItemReceipts\ItemReceiptResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditItemReceipt extends EditRecord
{
    protected static string $resource = ItemReceiptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
