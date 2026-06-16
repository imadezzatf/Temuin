<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->maxLength(255),

                Select::make('role')
                    ->label('Akses Fitur (Enum Bawaan)')
                    ->options([
                        'admin' => 'Admin (Bisa Masuk Panel)',
                        'user' => 'User (Hanya Frontend)',
                    ])
                    ->required()
                    ->default('admin'),

                // Hubungkan langsung ke Spatie Roles
                Select::make('roles')
                    ->label('Pangkat Spatie Permission')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->multiple()
                    ->required(),
            ]);
    }
}