<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomIncludeResource\Pages;
use App\Filament\Resources\RoomIncludeResource\RelationManagers;
use App\Models\RoomInclude;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomIncludeResource extends Resource
{
    protected static ?string $model = RoomInclude::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manage Data Core';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')->label('Rooms Include')
                ->placeholder('Example: tv,ac,dll')
                ->required()
                ->columnSpanFull()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextInputColumn::make('name')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListRoomIncludes::route('/'),
            'create' => Pages\CreateRoomInclude::route('/create'),
            'edit' => Pages\EditRoomInclude::route('/{record}/edit'),
        ];
    }
}
