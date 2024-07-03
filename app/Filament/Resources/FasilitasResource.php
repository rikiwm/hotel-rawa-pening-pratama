<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasilitasResource\Pages;
use App\Filament\Resources\FasilitasResource\RelationManagers;
use App\Models\Fasilitas;
use Filament\Forms;
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

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manage Data Core';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name_fasilitas')->label('Short Name')
                ->required()
                ->columnSpanFull()
                ->maxLength(255),
                Select::make('tag')
                ->multiple()
                ->columnSpanFull()
                ->options([
                    'Villa',
                    'hotel',
                    'wisma',
                    'pemandangan',
                ])->createOptionForm([]),
                SpatieMediaLibraryFileUpload::make('fasilitas')
                ->disk('public')
                ->collection('fasilitasis')
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
