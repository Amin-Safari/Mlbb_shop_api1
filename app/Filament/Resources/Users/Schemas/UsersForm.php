<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UsersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->minLength(3),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique('users'),
                TextInput::make('password')
                    ->required()->minLength(6)->password()->revealable()->confirmed()
                ,TextInput::make('password_confirmation')->required()->revealable()->password()
            ]);
    }
}
