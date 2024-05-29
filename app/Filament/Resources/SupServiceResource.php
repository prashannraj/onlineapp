<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupServiceResource\Pages;
use App\Filament\Resources\SupServiceResource\RelationManagers\PostRelationManager;
use App\Models\SupService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupServiceResource extends Resource
{
    protected static ?string $model = SupService::class;
    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-s-folder-minus';

    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sub_service_id')
                    ->relationship('sub_service', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
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
                Tables\Columns\TextColumn::make('service.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sub_service.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Sub Service name')
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
            PostRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupServices::route('/'),
            'create' => Pages\CreateSupService::route('/create'),
            'view' => Pages\ViewSupService::route('/{record}'),
            'edit' => Pages\EditSupService::route('/{record}/edit'),
        ];
    }
}
