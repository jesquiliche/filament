<?php

namespace App\Filament\Resources\BloqueResource\Pages;

use App\Filament\Resources\BloqueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBloque extends EditRecord
{
    protected static string $resource = BloqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
