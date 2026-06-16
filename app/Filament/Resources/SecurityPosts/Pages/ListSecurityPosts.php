<?php

namespace App\Filament\Resources\SecurityPosts\Pages;

use App\Filament\Resources\SecurityPosts\SecurityPostResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSecurityPosts extends ListRecords
{
    protected static string $resource = SecurityPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
