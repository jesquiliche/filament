<?php

namespace App\Filament\Resources\FalloResource\Pages;

use App\Filament\Resources\FalloResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFallos extends ListRecords
{
    protected static string $resource = FalloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
