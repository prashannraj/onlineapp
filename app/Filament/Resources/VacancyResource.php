<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacancyResource\Pages;
use App\Models\Vacancy;
use App\Models\Post;
use App\Models\Service;
use App\Models\SubService;
use App\Models\SupService;
use App\Models\Level;
use App\Models\Qualification;
use App\Models\Quata;
use App\Models\Year;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-s-arrow-up-on-square-stack';

    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('year_id')
                ->options(function (callable $get) {
                    $year = Year::where('status', '1')->pluck('year', 'id');
                     return $year;
                })
                 ->label('Select Year')
                 ->searchable()
                 ->preload()
                ->required()
                ->afterStateUpdated(fn (callable $set) => $set('vacancy_id', null)),

                Forms\Components\Select::make('service_id')->default('')
                ->options(Service::all()->pluck('name', 'id'))
                ->label('Select Service')
                ->searchable()
                ->preload()
                ->required()
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('sub_service_id', null)),

                Forms\Components\Select::make('sub_service_id')
                ->options(function (callable $get) {
                    $service = Service::find($get('service_id'));
                    if (!$service) {
                        return SubService::all()->pluck('name', 'id');
                    }
                    return $service->sub_services->pluck('name', 'id');
                })
                ->label('Select Sub Service')
                ->searchable()
                ->preload()
                ->reactive()
                ->required()
                ->afterStateUpdated(fn (callable $set) => $set('sup_service_id', null)),

                Forms\Components\Select::make('sup_service_id')
                ->options(function (callable $get) {
                    $sub_service = SubService::find($get('sub_service_id'));
                    if (!$sub_service) {
                        return SupService::all()->pluck('name', 'id');
                    }
                    return $sub_service->sup_services->pluck('name', 'id');
                })
                ->label('Select Sup Service')
                ->searchable()
                ->preload()
                ->required()
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('post_id', null)),

                Forms\Components\Select::make('post_id')
                ->options(function (callable $get) {
                    $sup_service = SupService::find($get('sup_service_id'));
                    if (!$sup_service) {
                        return Post::all()->pluck('name', 'id');
                    }
                    return $sup_service->posts->pluck('name', 'id');
                })
                ->label('Select Post')
                ->searchable()
                ->preload()
                ->reactive()
                ->required()
                ->afterStateUpdated(fn (callable $set) => $set('qualification_id', null)),

                Forms\Components\Select::make('level_id')
                ->options(Level::all()->pluck('name', 'id'))->label('Level')
                    ->required(),

                Forms\Components\Select::make('qualification_id')
                ->options(Qualification::all()->pluck('name', 'id'))
                // ->options(function (callable $get) {
                //     $post = Post::find($get('post_id'));
                //     if (!$post) {
                //         return Qualification::all()->pluck('name', 'id');
                //     }
                //         return $post->qualifications->pluck('name', 'id');

                // })
                ->searchable()
                ->required()
                ->label('Minimum Qualification'),

                Forms\Components\TextInput::make('Adv_number')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('single_fee')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('double_fee')
                    ->required()
                    ->numeric(),
                Forms\Components\Checkboxlist::make('quatas')
                    ->relationship('quatas', 'name')
                   // ->multiple()
                   // ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('open_date_bs')
                    ->required(),
                Forms\Components\DatePicker::make('single_payment_date_bs')
                    ->required(),
                Forms\Components\DatePicker::make('double_payment_date_bs')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year.name')

                    ->sortable(),
                Tables\Columns\TextColumn::make('service.name')

                    ->sortable(),
                Tables\Columns\TextColumn::make('sub_service.name')

                    ->sortable(),
                Tables\Columns\TextColumn::make('sup_service.name')

                    ->sortable(),
                Tables\Columns\TextColumn::make('post.name')

                    ->sortable(),
                Tables\Columns\TextColumn::make('level.name')

                    ->sortable(),
                // Tables\Columns\TextColumn::make('qualification_id')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('Adv_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('single_fee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('double_fee')
                    ->numeric()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('quatas')

                //     ->sortable(),
                Tables\Columns\TextColumn::make('open_date_bs')
                    ->date()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('single_payment_date_bs')
                //     ->date()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('double_payment_date_bs')
                //     ->date()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListVacancies::route('/'),
            'create' => Pages\CreateVacancy::route('/create'),
            'view' => Pages\ViewVacancy::route('/{record}'),
            'edit' => Pages\EditVacancy::route('/{record}/edit'),
        ];
    }
}
