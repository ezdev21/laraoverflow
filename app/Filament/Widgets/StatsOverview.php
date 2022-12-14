<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Unique Views','120')
            ->description('67 increase')
            ->chart([3,5,7,10,16,25])
            ->descriptionIcon('heroicon-s-trending-up')
            ->color('success'),
            Card::make('Bounce Rate','21%')
            ->description('23% increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->color('success'),
            Card::make('Average time on page','3:45')
            ->description('3% increase')
            ->descriptionIcon('heroicon-s-trending-up')
        ];
    }
}
