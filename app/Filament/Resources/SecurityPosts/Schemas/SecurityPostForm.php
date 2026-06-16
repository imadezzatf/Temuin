<?php

namespace App\Filament\Resources\SecurityPosts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SecurityPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Pos Satpam')
                    ->required(),
            ]);
    }
}