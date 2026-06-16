<?php

namespace App\Filament\Resources\ClaimRequests;

use App\Filament\Resources\ClaimRequests\Pages\CreateClaimRequest;
use App\Filament\Resources\ClaimRequests\Pages\EditClaimRequest;
use App\Filament\Resources\ClaimRequests\Pages\ListClaimRequests;
use App\Filament\Resources\ClaimRequests\Schemas\ClaimRequestForm;
use App\Filament\Resources\ClaimRequests\Tables\ClaimRequestsTable;
use App\Models\ClaimRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ClaimRequestResource extends Resource
{
    protected static ?string $model = ClaimRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck; // Ikon clipboard dengan tanda centang untuk menggambarkan klaim yang sudah diperiksa

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $navigationLabel = 'Permintaan Klaim';

    protected static ?string $pluralModelLabel = 'Permintaan Klaim';

    protected static ?string $modelLabel = 'Permintaan Klaim';


    public static function form(Schema $schema): Schema
    {
        return ClaimRequestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClaimRequestsTable::configure($table);
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
            'index' => ListClaimRequests::route('/'),
            'create' => CreateClaimRequest::route('/create'),
            'edit' => EditClaimRequest::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('status', 'Pending');
    }
}
