<?php

namespace App\Filament\Resources\SecurityPosts\Pages;

use App\Filament\Resources\SecurityPosts\SecurityPostResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSecurityPost extends CreateRecord
{
    protected static string $resource = SecurityPostResource::class;
}
