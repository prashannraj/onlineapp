<?php

namespace App\Filament\Resources\MotherToungeResource\Pages;

use App\Filament\Resources\MotherToungeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMotherTounge extends ViewRecord
{
    protected static string $resource = MotherToungeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
