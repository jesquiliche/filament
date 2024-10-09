<?php

namespace App\Filament\Resources\BloqueResource\Pages;

use App\Filament\Resources\BloqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBloques extends ListRecords
{
    protected static string $resource = BloqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
