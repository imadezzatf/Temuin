<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\ClaimRequest;
use App\Models\FoundItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InfoOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Barang Temuan', FoundItem::count())
                ->description('Semua barang yang dilaporkan')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('success'),
            #kalin yg statusnya pending aja
            Stat::make('Permintaan Klaim', ClaimRequest::where('status', 'Pending')->count())
                ->description('Butuh verifikasi satpam')
                ->descriptionIcon('heroicon-m-clipboard-document-check')
                ->color('warning'),

            Stat::make('Total Kategori', Category::count())
                ->description('Kategori barang terdata')
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary'),
        ];
    }
}