<?php

namespace App\Filament\Resources\UserMessages\Pages;

use App\Filament\Resources\UserMessages\UserMessageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserMessage extends EditRecord
{
    protected static string $resource = UserMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
