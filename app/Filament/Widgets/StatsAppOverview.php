<?php

namespace App\Filament\Widgets;

use App\Models\Fasilitas;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\User;
use App\Models\Slider;

use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAppOverview extends BaseWidget
{


    protected static ?string $pollingInterval = '10s';
    protected static ?int $sort = -3;

    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count())
            ->description('Users')
            ->color('warning'),
            Stat::make('Villa & Room', Room::count())
            ->description('Villa & Room')
            ->color('warning'),
            Stat::make('Facilitas', Fasilitas::count())
            ->description('Facilitas')
            ->color('warning'),

        ];
    }
}
