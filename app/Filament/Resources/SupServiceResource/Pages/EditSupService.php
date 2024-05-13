<?php

namespace App\Filament\Resources\SupServiceResource\Pages;

use App\Filament\Resources\SupServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupService extends EditRecord
{
    protected static string $resource = SupServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
