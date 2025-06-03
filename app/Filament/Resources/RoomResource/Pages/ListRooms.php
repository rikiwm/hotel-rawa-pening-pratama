<?php

namespace App\Filament\Resources\RoomResource\Pages;

use App\Filament\Resources\RoomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use App\Models\Room;
use Filament\Actions\ActionGroup;
use Filament\Widgets\Widget;

class ListRooms extends ListRecords
{
    protected static string $resource = RoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return static::$resource::getWidgets();
    }

    public function getTabs(): array
    {

        $tabs = [
            null => Tab::make('All'),
            'Rooms' => Tab::make()->query(fn ($query) => $query->where('type_room','=','1')),
            'Villas' => Tab::make()->query(fn ($query) => $query->where('type_room','=','2')),

        ];


        return $tabs;
    }
}
