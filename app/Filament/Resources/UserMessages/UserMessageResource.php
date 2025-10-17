<?php

namespace App\Filament\Resources\UserMessages;

use App\Filament\Resources\UserMessages\Pages\CreateUserMessage;
use App\Filament\Resources\UserMessages\Pages\EditUserMessage;
use App\Filament\Resources\UserMessages\Pages\ListUserMessages;
use App\Filament\Resources\UserMessages\Schemas\UserMessageForm;
use App\Filament\Resources\UserMessages\Tables\UserMessagesTable;
use App\Models\UserMessage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\UserMessage as um;

class UserMessageResource extends Resource
{
    protected static ?string $model = um::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Envelope;

    protected static ?string $recordTitleAttribute = 'User Messages';

    public static function form(Schema $schema): Schema
    {
        return UserMessageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserMessagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserMessages::route('/'),
            'create' => CreateUserMessage::route('/create'),
            'edit' => EditUserMessage::route('/{record}/edit'),
        ];
    }
}
