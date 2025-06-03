<?php

namespace App\Filament\Resources\RoomIncludeResource\Pages;

use App\Filament\Resources\RoomIncludeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoomIncludes extends ListRecords
{
    protected static string $resource = RoomIncludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
