<?php

namespace App\Filament\Resources\PortofolioitemresourceResource\Widgets;

use App\Models\Category;
use App\Models\PortfolioItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Poze', PortfolioItem::count())
                ->description('Numar de poze incarcate')
                ->descriptionIcon('heroicon-m-camera')
                ->color('success'),
            Stat::make('Total Categorii', Category::count())
                ->description('Numar de categorii')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('warning'),
        ];
    }
}