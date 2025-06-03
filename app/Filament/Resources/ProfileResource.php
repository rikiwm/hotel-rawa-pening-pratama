<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;

use App\Filament\Exports\ProductExporter;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\Action;


class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationLabel = 'Profile Web';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
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
                    Select::make('icon')->options([
                        '<i class="uil uil-globe"></i>' => 'Website',
                        '<i class="uil uil-whatsapp"></i>' => 'WhatsApp',
                        ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="social" class="bi bi-tiktok" viewBox="0 0 16 16"><path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" /></svg>
' => 'Tiktok',
                        '<i class="uil uil-facebook"></i>' => 'Facebook',
                        '<i class="uil uil-instagram-alt"></i>' => 'Instagram',
                        '<i class="uil uil-twitter"></i>' => 'Tweeter',
                        '<i class="uil uil-youtube"></i>' => 'YouTube',
                        '<i class="uil uil-line"></i>' => 'Line',
                        '<i class="uil uil-linkedin"></i>' => 'Linkedin',
                        '<i class="uil uil-paypal"></i>' => 'PayPal',
                        '<i class="uil uil-telegram"></i>' => 'Telegram',
                        '<i class="uil uil-envelopes"></i>' => 'Mail',
                        '<i class="uil uil-apps"></i>' => 'App Name',
                        '<i class="uil uil-clipboard-notes"></i>' => 'App Description',
                        '<i class="uil uil-copyright"></i>' => 'Footer Text',
                    ])->searchable(),
                    TextInput::make('sub_value')->placeholder('Opsional'),
                    Select::make('group_name')
                    ->label('Group Name')
                    ->options([
                        'general' => 'General',
                        'email' => 'Email',
                        'socialprofile' => 'Social Profiles',
                    ])
                    ->required()
                    ->searchable(),
                    TextInput::make('value')->placeholder('Desc : ex-jln padang')->columnSpanFull(),
                    TextInput::make('url_profile')->placeholder('Ex: https://google.com/name')->columnSpanFull()->default('https://')->url()->suffixIcon('heroicon-m-globe-alt'),
                    Toggle::make('status')->inline(false)->required()->onIcon('heroicon-c-check')
                ->offIcon('heroicon-m-x-mark')
                    // ...
                ])->columns(4)

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
             ])->emptyStateDescription('Once you write your first post, it will appear here.')
             ->emptyStateActions([
                Action::make('create')
                    ->label('Create Profile Web')
                    ->url(route('filament.admin.resources.profiles.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->headerActions([


                // ExportAction::make()
                //     ->exporter(RoomResource::class)
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
