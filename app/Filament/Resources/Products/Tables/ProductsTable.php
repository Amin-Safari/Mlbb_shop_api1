<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;


class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('icon')
                    ->searchable()
                    ->alignCenter()
                    ->toggleable(),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('description')
                    ->toggleable(),
                TextColumn::make('price')
                    ->sortable()
                    ->searchable()
                    ->alignCenter()
                    ->toggleable(),
                TextColumn::make('originalPrice')
                    ->sortable()
                    ->searchable()
                    ->alignCenter()
                    ->toggleable(),
                TextColumn::make('discount')
                    ->sortable()
                    ->searchable()
                    ->alignCenter()
                    ->toggleable(),
                TextColumn::make('pricePerDiamond')
                    ->sortable()
                    ->searchable()
                    ->alignCenter()
                    ->toggleable(),
                IconColumn::make('popular')
                    ->sortable()
                    ->searchable()
                    ->alignCenter()
                    ->toggleable()
                    ->boolean(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
