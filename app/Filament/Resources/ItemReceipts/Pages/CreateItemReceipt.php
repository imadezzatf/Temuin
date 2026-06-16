<?php

namespace App\Filament\Resources\ItemReceipts\Pages;

use App\Filament\Resources\ItemReceipts\ItemReceiptResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\FoundItem;

class CreateItemReceipt extends CreateRecord
{
    protected static string $resource = ItemReceiptResource::class;

    protected function afterCreate(): void
    {
        $item = FoundItem::find($this->record->found_item_id);

        if ($item) {
            $item->update([
                'status' => 'Sudah Diambil',
            ]);
        }
    }
}