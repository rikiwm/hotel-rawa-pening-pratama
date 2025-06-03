<?php

namespace App\Filament\Resources\RoomIncludeResource\Pages;

use App\Filament\Resources\RoomIncludeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoomInclude extends EditRecord
{
    protected static string $resource = RoomIncludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
