<?php

namespace App\Filament\Resources\SecurityPosts\Pages;

use App\Filament\Resources\SecurityPosts\SecurityPostResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSecurityPost extends EditRecord
{
    protected static string $resource = SecurityPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
