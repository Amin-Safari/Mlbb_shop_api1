<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('icon')
                    ->required()
                    ->maxLength(2)
                    ->trim(),
                TextInput::make('title')
                    ->required()
                    ->trim()
                    ->minLength(2)
                    ->maxLength(255),
                Textarea::make('description')
                    ->required()
                    ->trim(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->suffix('toman')
                    ->step(10000)
                    ->trim(),
                TextInput::make('originalPrice')
                    ->required()
                    ->numeric()
                    ->suffix('toman')
                    ->step(10000)
                    ->trim(),
                TextInput::make('pricePerDiamond')
                    ->required()
                    ->numeric()
                    ->suffix('toman')
                    ->step(10000)
                    ->trim(),
                TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->maxValue(100)
                    ->suffix('%'),
                Toggle::make('popular')
                    ->default(false)
                    ->inline()
            ]);
    }
}
