<?php

namespace App\Filament\Resources\MotherToungeResource\Pages;

use App\Filament\Resources\MotherToungeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMotherTounge extends EditRecord
{
    protected static string $resource = MotherToungeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
