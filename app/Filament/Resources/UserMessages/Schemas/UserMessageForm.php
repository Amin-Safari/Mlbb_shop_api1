<?php

namespace App\Filament\Resources\UserMessages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->minLength(3)
                    ->maxLength(225)
                    ->required(),
                TextInput::make('email')
                    ->email()->
                    maxLength(225)
                    ->required(),
                TextInput::make('phone')
                    ->length(11)
                    ->required(),
                Select::make('subject')
                    ->options([
                        'support' => 'support',
                        'sales' => 'sales',
                        'complaint' => 'complaint'
                        , 'cooperation' => 'cooperation',
                        'other' => 'other'
                    ])
                    ->required(),
                Textarea::make('message')
                    ->required()
            ]);
    }
}
