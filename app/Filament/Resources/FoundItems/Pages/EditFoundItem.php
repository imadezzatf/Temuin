<?php

namespace App\Filament\Resources\FoundItems\Pages;

use App\Filament\Resources\FoundItems\FoundItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFoundItem extends EditRecord
{
    protected static string $resource = FoundItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
