<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-m-square-2-stack';
    protected static ?string $navigationLabel = 'Sliders';
    protected static ?string $navigationGroup = 'Manage Data Core';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               TextInput::make('title')->label('Short Title')
                ->required()
                ->columnSpanFull()
                ->maxLength(255),
                TextInput::make('sub_title')->label('Title Desc')
                ->required(false)
                ->columnSpanFull()
                ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('slider')
                ->disk('public')
                ->collection('sliders')
                ->image()
                ->columnSpanFull(),
                Toggle::make('status')->inline(false)->required()->onIcon('heroicon-c-check')
                ->offIcon('heroicon-m-x-mark')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                SpatieMediaLibraryImageColumn::make('slider')->collection('sliders')->conversion('thumb')->circular()->label('Image'),
                Tables\Columns\ToggleColumn::make('status'),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(false),
                Tables\Actions\DeleteAction::make()->label(false),

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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
