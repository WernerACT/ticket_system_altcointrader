<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Department;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketResource extends Resource
{
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'reference';

    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('reference')->readOnly(),
                Textarea::make('description')
                    ->required()->autosize(),
                DateTimePicker::make('opened_at'),
                Select::make('department_id')
                    ->relationship('department', 'name')->required(),
                Select::make('status_id')
                    ->relationship('status', 'name')->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->limit(45)->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('reference')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->searchable()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->searchable()->sortable(),
                SelectColumn::make('department_id')
                    ->label('Department')
                    ->options(Department::all()->pluck('name', 'id')->toArray())
                    ->sortable()->searchable(),
                SelectColumn::make('status_id')
                    ->label('Status')
                    ->options(Status::all()->pluck('name', 'id')->toArray())
                    ->sortable()->searchable(),
                SelectColumn::make('user_id')
                    ->label('Assigned To')
                    ->options(User::all()->pluck('name', 'id')->toArray())
                    ->sortable()->searchable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->relationship('status', 'name'),
                SelectFilter::make('department')
                    ->relationship('department', 'name'),
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
                SelectFilter::make('user')
                    ->relationship('user', 'name')->searchable()
            ])->persistFiltersInSession()
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UserRelationManager::class,
            RelationManagers\ResponsesRelationManager::class,
            RelationManagers\ImagesRelationManager::class,
            RelationManagers\DocumentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }
}
