<?php

namespace App\Filament\Resources\ClaimRequests\Pages;

use App\Filament\Resources\ClaimRequests\ClaimRequestResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditClaimRequest extends EditRecord
{
    protected static string $resource = ClaimRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
