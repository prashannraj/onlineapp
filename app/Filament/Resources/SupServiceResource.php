<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupServiceResource\Pages;
use App\Filament\Resources\SupServiceResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListSupServices::route('/'),
            'create' => Pages\CreateSupService::route('/create'),
            'view' => Pages\ViewSupService::route('/{record}'),
            'edit' => Pages\EditSupService::route('/{record}/edit'),
        ];
    }
}
