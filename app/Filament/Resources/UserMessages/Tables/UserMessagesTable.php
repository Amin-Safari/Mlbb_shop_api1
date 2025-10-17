<?php

namespace App\Filament\Resources\UserMessages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UserMessagesTable
{
//->badge()
//->color(fn (string $state): string => match ($state) {
//'draft' => 'gray',
//'reviewing' => 'warning',
//'published' => 'success',
//'rejected' => 'danger',
//})
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                TextColumn::make('subject'),
                TextColumn::make('message'),
                TextColumn::make('create_at')
                    ->label('send at')
                    ->dateTime('M j, Y H:i:s')
            ])
            ->filters([
                SelectFilter::make('subject')
                    ->options([
                        'support', 'sales', 'complaint', 'cooperation', 'other'
                    ])
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
