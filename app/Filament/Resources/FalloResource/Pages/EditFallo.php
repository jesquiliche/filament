<?php

namespace App\Filament\Resources\FalloResource\Pages;

use App\Filament\Resources\FalloResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFallo extends EditRecord
{
    protected static string $resource = FalloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
