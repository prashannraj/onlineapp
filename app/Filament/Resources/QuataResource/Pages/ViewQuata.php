<?php

namespace App\Filament\Resources\QuataResource\Pages;

use App\Filament\Resources\QuataResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewQuata extends ViewRecord
{
    protected static string $resource = QuataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
