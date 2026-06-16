<?php

namespace App\Filament\Resources\SecurityPosts;

use App\Filament\Resources\SecurityPosts\Pages\CreateSecurityPost;
use App\Filament\Resources\SecurityPosts\Pages\EditSecurityPost;
use App\Filament\Resources\SecurityPosts\Pages\ListSecurityPosts;
use App\Filament\Resources\SecurityPosts\Schemas\SecurityPostForm;
use App\Filament\Resources\SecurityPosts\Tables\SecurityPostsTable;
use App\Models\SecurityPost;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SecurityPostResource extends Resource
{
    protected static ?string $model = SecurityPost::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShieldCheck; // Ikon perisai dengan tanda centang untuk menggambarkan pos satpam yang aman dan terjaga

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Pos Satpam';

    public static function form(Schema $schema): Schema
    {
        return SecurityPostForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SecurityPostsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSecurityPosts::route('/'),
            'create' => CreateSecurityPost::route('/create'),
            'edit' => EditSecurityPost::route('/{record}/edit'),
        ];
    }
}
