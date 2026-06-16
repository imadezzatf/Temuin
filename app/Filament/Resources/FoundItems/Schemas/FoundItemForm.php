<?php

namespace App\Filament\Resources\FoundItems\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Support\Facades\Auth;

class FoundItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('item_name')
                    ->label('Nama Barang')
                    ->required(),

                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required(),

                FileUpload::make('photo')
                    ->label('Foto Barang')
                    ->image()
                    ->disk('public')
                    ->directory('found-items'),

                Textarea::make('description')
                    ->label('Deskripsi'),

                TextInput::make('location_found')
                    ->label('Lokasi Ditemukan')
                    ->required(),

                Select::make('security_post_id')
                    ->label('Dititipkan di')
                    ->relationship('securityPost', 'name')
                    ->required(),

                DateTimePicker::make('found_at')
                    ->label('Waktu Ditemukan')
                    ->default(now())
                    ->required(),

                Select::make('status')
                    ->options([
                        'Tersedia' => 'Tersedia',
                        'Sudah Diambil' => 'Sudah Diambil',
                    ])
                    ->default('Tersedia')
                    ->required(),

                TextInput::make('created_by')
                    ->default(fn() => Auth::id())
                    ->hidden(),
                Select::make('tags')
                    ->label('Tag / Ciri')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
            ]);
    }
}
