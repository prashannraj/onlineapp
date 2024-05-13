<?php

namespace App\Filament\Resources\QuataResource\Pages;

use App\Filament\Resources\QuataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuata extends EditRecord
{
    protected static string $resource = QuataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
