<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GenderResource\Pages;
use App\Filament\Resources\GenderResource\RelationManagers;
use App\Models\Gender;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GenderResource extends Resource
{
    protected static ?string $model = Gender::class;
    protected static ?int $navigationSort = 7;
    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}

    protected static ?string $navigationIcon = 'heroicon-s-user-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'asc')
            ->columns([
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
            'index' => Pages\ListGenders::route('/'),
            'create' => Pages\CreateGender::route('/create'),
            'view' => Pages\ViewGender::route('/{record}'),
            'edit' => Pages\EditGender::route('/{record}/edit'),
        ];
    }
}
