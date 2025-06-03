<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestmimoniResource\Pages;
use App\Filament\Resources\TestmimoniResource\RelationManagers;
use App\Models\Testimoni;
use App\Models\Testmimoni;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestmimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manage Data Service';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([

                Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('Name & Values')
                        ->schema([
                        Split::make([
                          Section::make([
                                TextInput::make('name')->label('Name Client')
                                ->required()->live(debounce: 500)
                                ->maxLength(255),
                                Textarea::make('testi_value')->label('Values')
                                ->maxLength(255),

                            ]),
                            Section::make([
                                Select::make('icon_img')
                                ->label('Gender Client')->placeholder('Select Gender')
                                ->options([
                                    '0' => 'Man',
                                    '1' => 'Woman',
                                ])
                                ->searchable(),
                                Toggle::make('is_publish')->inline(true)->label('Publish')
                                ->required()
                                ->onColor('warning')
                                ->offColor('danger')
                                ->onIcon('heroicon-c-check')
                                ->offIcon('heroicon-m-x-mark')
                            ]),
                        ])->from('md'),
                        ]),
                        Tabs\Tab::make('Images')
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('testimoni')->label('Photos')
                            ->disk('public')
                            ->collection('testimonis')
                            ->image(),
                        ]),

                    ])->columnSpan('2')->contained(false),

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
            'index' => Pages\ListTestmimonis::route('/'),
            'create' => Pages\CreateTestmimoni::route('/create'),
            'edit' => Pages\EditTestmimoni::route('/{record}/edit'),
        ];
    }
}
