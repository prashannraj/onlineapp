<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacancyResource\Pages;
use App\Filament\Resources\VacancyResource\RelationManagers;
use App\Models\Vacancy;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('year_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('service_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('sub_service_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('sup_service_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('post_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('level_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('qualification_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('service')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sub_service')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sup_service')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('post')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('level')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('qualification')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Adv_number')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('single_fee')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('double_fee')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('open_date_bs')
                    ->required(),
                Forms\Components\DatePicker::make('single_payment_date_bs')
                    ->required(),
                Forms\Components\DatePicker::make('double_payment_date_bs')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sub_service_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sup_service_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('post_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('level_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('qualification_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sub_service')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sup_service')
                    ->searchable(),
                Tables\Columns\TextColumn::make('post')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->searchable(),
                Tables\Columns\TextColumn::make('qualification')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Adv_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('single_fee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('double_fee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('open_date_bs')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('single_payment_date_bs')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('double_payment_date_bs')
                    ->date()
                    ->sortable(),
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
