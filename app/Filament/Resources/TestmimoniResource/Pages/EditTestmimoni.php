<?php

namespace App\Filament\Resources\TestmimoniResource\Pages;

use App\Filament\Resources\TestmimoniResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestmimoni extends EditRecord
{
    protected static string $resource = TestmimoniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
