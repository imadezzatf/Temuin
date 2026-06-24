<?php

namespace App\Filament\Resources\ClaimRequests\Pages;

use App\Filament\Resources\ClaimRequests\ClaimRequestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListClaimRequests extends ListRecords
{
    protected static string $resource = ClaimRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->where('status', 'Pending');
    }
}
