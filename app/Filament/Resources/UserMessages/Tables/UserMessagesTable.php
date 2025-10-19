<?php

namespace App\Filament\Resources\UserMessages\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\TextSize;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UserMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('seen')
                    ->sortable()
                    ->alignCenter()
                    ->toggleable()
                    ->boolean(),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->searchable()
                    ->alignCenter()
                    ->toggleable(),
                TextColumn::make('phone')
                    ->searchable()
                    ->alignCenter()
                    ->toggleable(),
                TextColumn::make('subject')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'support' => 'gray',
                        'sales' => 'warning',
                        'complaint' => 'success',
                        'cooperation' => 'danger',
                        'other' => 'primary'
                    })
                    ->sortable()
                    ->searchable()
                    ->alignCenter()
                    ->toggleable(),
                TextColumn::make('message')
                    ->limit(60)
                    ->tooltip(fn($state) => $state)
                    ->wrap()
                    ->toggleable()
                    ->size(TextSize::ExtraSmall),
                TextColumn::make('created_at')
                    ->label('send at')
                    ->dateTime('M j, Y H:i:s')
                    ->alignCenter()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('subject')
                    ->options([
                        'support', 'sales', 'complaint', 'cooperation', 'other'
                    ]),
            ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                Action::make('seen')
                    ->label(fn ($record) => $record->seen ? 'Unseen' : 'Seen')
                    ->icon(fn ($record) => $record->seen ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->action(function ($record) {
                        $record->update([
                            'seen' => !$record->seen
                        ]);
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('mark_as_seen')
                        ->icon('heroicon-o-eye')
                        ->color('success')
                        ->action(function ( $records) {
                            $records->each->update(['seen' => true]);
                        })
                        ->deselectRecordsAfterCompletion()
                    ]),
            ]);
    }
}
