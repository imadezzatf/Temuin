<?php

namespace App\Filament\Resources\FoundItems\Pages;

use App\Filament\Resources\FoundItems\FoundItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFoundItems extends ListRecords
{
    protected static string $resource = FoundItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
