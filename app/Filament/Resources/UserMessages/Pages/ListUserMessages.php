<?php

namespace App\Filament\Resources\UserMessages\Pages;

use App\Filament\Resources\UserMessages\UserMessageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserMessages extends ListRecords
{
    protected static string $resource = UserMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
