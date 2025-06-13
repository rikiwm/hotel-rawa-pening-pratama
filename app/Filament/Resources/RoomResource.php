<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Categori;
use App\Models\Fasilitas;
use App\Models\Room;
use App\Models\RoomInclude;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
// use Filament\Tables\Actions\ExportBulkAction;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;
    protected static int $globalSearchResultsLimit = 5;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Rooms & Villa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('Name & Values')->icon('heroicon-m-bell')
                        ->schema([
                            Section::make([
                                Select::make('type_room')->placeholder('Select Type')
                                ->label('Type')
                                ->options(Categori::all()->pluck('name', 'id'))
                                ->searchable()->required(),
                            ])->columnSpanFull(),
                                Split::make([

                                Section::make([
                                    TextInput::make('name_room')->placeholder('Ex : Agung')->label('Villa or Room Name')->required()->autocapitalize('words')
                                        ->maxLength(255),
                                        TextInput::make('price')->placeholder('350000')->integer()->prefix('Rp.')
                                        ->maxLength(255),
                                        TextInput::make('capacity')->placeholder('example : 2 People')->suffixIcon('heroicon-m-user-circle')
                                        ->suffixIconColor('warning')->required(),
                                    ]),
                                    Section::make([
                                        TextInput::make('unit_kamar')->label('Rooms Unit')->placeholder('example : 1')->integer()->suffixIcon('heroicon-m-home'),
                                        TextInput::make('unit_single_bed')->label('Single Bed')->placeholder('example : 1 Singe Bed')->suffix('Unit'),
                                        TextInput::make('unit_double_bed')->label('Double Bed')->placeholder('example : 1 Double Bed')->suffix('Unit'),
                                    ]),
                                ])->from('md'),
                                ]),
                                Tabs\Tab::make('Images')
                                ->schema([
                                    Section::make([
                                    SpatieMediaLibraryFileUpload::make('room')->label('Upload Villa/Room Photos')
                                    ->disk('public')
                                    ->collection('rooms')
                                    ->image()
                                    ->panelLayout('grid')
                                    ->multiple()
                                    ->reorderable()
                                    ->appendFiles()
                                ]),
                                ]),
                                Tabs\Tab::make('Meta Seo')
                                ->schema([
                                    Section::make([
                                    Select::make('tag')
                                    ->multiple()
                                    ->options(Tag::all()->pluck('name_tag', 'id'))
                                    ->createOptionForm([]),
                                    TextInput::make('seo_title')->label('Meta Title')->suffixIcon('heroicon-m-home'),
                                    Textarea::make('seo_description')->label('Meta Description')->columnSpanFull(),

                                ]),
                                ]),
                                Tabs\Tab::make('Location')
                                ->schema([
                                    Section::make([
                                    RichEditor::make('description')->placeholder('Ex : Best Rooms')->columnSpanFull(),
                                    Textarea::make('location')->minLength(2)->rows(2)->placeholder('Ex : Jln')->columnSpanFull(),
                                ]),
                                ]),

                    ])->columnSpan('2')->contained(false),
                    Fieldset::make('VILLA OR ROOM ')
                    ->schema([
                        Section::make([
                            CheckboxList::make('room_fasilitas')->label('Include this Room')->options(RoomInclude::all()->pluck('name', 'id'))->columns(12),
                            ToggleButtons::make('is_active')->label('Publis this Room?')->boolean()->inline(false)->required()->columnStart('2')->grouped(),
                            ])
                        ])
                    ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name_room')->sortable(),
                Tables\Columns\TextColumn::make('price')->money('Rp.')->sortable(),
                SpatieMediaLibraryImageColumn::make('room')->collection('rooms')->conversion('thumb')
                ->circular()
                ->stacked()
                ->limit(3)
                ->limitedRemainingText()
                ->label('Image'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultTitle($record): Htmlable|string
    {
        return $record->name_room; // Contoh: sesuaikan dengan atribut yang benar
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name_room'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Price' => $record->price
        ];
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }
}
