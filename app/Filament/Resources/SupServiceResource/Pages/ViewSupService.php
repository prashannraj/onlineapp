<?php

namespace App\Filament\Resources\SupServiceResource\Pages;

use App\Filament\Resources\SupServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSupService extends ViewRecord
{
    protected static string $resource = SupServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
