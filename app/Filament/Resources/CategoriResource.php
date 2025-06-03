<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriResource\Pages;
use App\Filament\Resources\CategoriResource\RelationManagers;
use App\Models\Categori;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class CategoriResource extends Resource
{
    protected static ?string $model = Categori::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static ?string $navigationGroup = 'Manage Data Core';


    // public static function globalSearch(): array
    // {
    //     return [
    //         GlobalSearch::make()
    //             ->label('Categori')
    //             ->resource(static::class)
    //             ->searchable(['name', 'icon']),
    //     ];
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Categori')
                ->schema([
                        TextInput::make('name')->label('Name Categori Room')
                        ->required()->placeholder('Example:Room / Villas / Ball Room')
                        ->maxLength(255),
                        TextInput::make('icon')->label('Icon Categori')->placeholder('Optional')
                        ->maxLength(255),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextInputColumn::make('name')->sortable(),

            ])
            ->filters([
                //
                Filter::make('name')
                ->default()
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('view')->form([
                    TextInput::make('name')->label('Name Categori Room'),
                ]) ->slideOver(),
                Tables\Actions\DeleteAction::make(),


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
            'index' => Pages\ListCategoris::route('/'),
            'create' => Pages\CreateCategori::route('/create'),
            'view' => Pages\EditCategori::route('/{record}'),
            'edit' => Pages\EditCategori::route('/{record}/edit'),
        ];
    }

    // public static function getGlobalSearchEloquentQuery(): Builder
    // {
    //     return parent::getGlobalSearchEloquentQuery()->with(['category']);
    // }

    public static function getGlobalSearchResultTitle($record): Htmlable|string
    {
        return $record->name; // Contoh: sesuaikan dengan atribut yang benar
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'icon'];
    }
}
