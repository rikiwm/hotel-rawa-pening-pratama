<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationLabel = 'Profile Web';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $activeNavigationIcon = null;
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Setting';


    public static function form(Form $form): Form
    {

        return $form
      
            ->schema([
                Fieldset::make('Profile Website')
                ->schema([
                    TextInput::make('name')->placeholder('Key : WA/Address/Phone'),
                    TextInput::make('value')->placeholder('Desc : ex-jln padang'),
                    TextInput::make('sub_value')->placeholder('Opsional'),
                    TextInput::make('icon')->placeholder('Opsional'),
                    Toggle::make('status')->inline(false)->required()->onIcon('heroicon-c-check')
                ->offIcon('heroicon-m-x-mark')
                    // ...
                ])
                ->columns(4)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->sortable()->label('Key'),
                Tables\Columns\TextColumn::make('value')->sortable(),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
