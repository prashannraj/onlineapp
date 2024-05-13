<?php

namespace App\Filament\Resources\MotherToungeResource\Pages;

use App\Filament\Resources\MotherToungeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMotherTounges extends ListRecords
{
    protected static string $resource = MotherToungeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
