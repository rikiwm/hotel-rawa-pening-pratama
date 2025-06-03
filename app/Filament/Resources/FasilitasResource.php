<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasilitasResource\Pages;
use App\Filament\Resources\FasilitasResource\RelationManagers;
use App\Models\Fasilitas;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    protected static ?string $navigationGroup = 'Manage Data Service';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Fieldset::make('Fasilitas')
                ->schema([
                TextInput::make('name_fasilitas')->label('Fasilitas Name')->placeholder('Example : Metting Room, Coffee Shop')
                ->required()
                ->columnSpanFull()
                ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('fasilitas')->label('Image Fasilitas')
                ->disk('public')
                ->collection('fasilitasis')
                ->image()
                ->columnSpanFull(),
                ToggleButtons::make('status')
                ->label('Publis this Fasilitas?')
                ->boolean()->inline(false)->required()
                ->grouped(),
                // Toggle::make('status')->inline(false)->required()->onIcon('heroicon-c-check')->label('Pu')
                // ->offIcon('heroicon-m-x-mark')
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name_fasilitas')->sortable()->label('Name'),
                TextColumn::make('slug')
                ->badge()->color('warning'),
                SpatieMediaLibraryImageColumn::make('fasilitas')->collection('fasilitasis')->conversion('thumb')
                ->circular()
                ->stacked()
                ->limit(3)
                ->limitedRemainingText()
                ->label('Image'),
                TextColumn::make('updated_at')
                ->since()

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
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }
}
