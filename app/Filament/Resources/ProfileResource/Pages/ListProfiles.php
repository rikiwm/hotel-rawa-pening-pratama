<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Actions;
use App\Models\Profile;
use Filament\Actions\ActionGroup;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;

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
            'General' => Tab::make()->query(fn ($query) => $query->where('group_name','=','general')),
            'Sosial' => Tab::make()->query(fn ($query) => $query->where('group_name','=','socialprofile')),
            'Email' => Tab::make()->query(fn ($query) => $query->where('group_name','=','email')),
        ];


        return $tabs;
    }

}
