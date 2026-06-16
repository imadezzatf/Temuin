<?php

namespace App\Filament\Resources\FoundItems\Pages;

use App\Filament\Resources\FoundItems\FoundItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFoundItem extends CreateRecord
{
    protected static string $resource = FoundItemResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();

        return $data;
    }
}