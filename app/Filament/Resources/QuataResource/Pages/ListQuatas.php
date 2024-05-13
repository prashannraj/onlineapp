<?php

namespace App\Filament\Resources\QuataResource\Pages;

use App\Filament\Resources\QuataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuatas extends ListRecords
{
    protected static string $resource = QuataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
