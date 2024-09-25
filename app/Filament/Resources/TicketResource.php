<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Department;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Services\TicketHistoryService;
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
use Illuminate\Support\Facades\Auth;

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
                    ->relationship('department', 'name')
                    ->required()
                    ->afterStateUpdated(function ($state, $old, $livewire) {
                        if ($state !== $old) {
                            $departmentOld = Department::find($old)->name ?? 'Unknown';
                            $departmentNew = Department::find($state)->name ?? 'Unknown';
                            $adminName = Auth::user()->name;

                            // Access the record from the Livewire component
                            $ticket = $livewire->record;
                            $comment = "Admin Update, the ticket's department was changed from {$departmentOld} to {$departmentNew} by {$adminName}.";

                            app(TicketHistoryService::class)->recordHistory($ticket->id, $comment);
                        }
                    }),
                Select::make('status_id')
                    ->relationship('status', 'name')
                    ->required()
                    ->afterStateUpdated(function ($state, $old, $livewire) {
                        if ($state !== $old) {
                            $statusOld = Status::find($old)->name ?? 'Unknown';
                            $statusNew = Status::find($state)->name ?? 'Unknown';
                            $adminName = Auth::user()->name;

                            // Access the record from the Livewire component
                            $ticket = $livewire->record;
                            $comment = "Admin Update, the ticket's status was changed from {$statusOld} to {$statusNew} by {$adminName}.";

                            app(TicketHistoryService::class)->recordHistory($ticket->id, $comment);
                        }
                    }),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->afterStateUpdated(function ($state, $old, $livewire) {
                        if ($state !== $old) {
                            $userOld = User::find($old)->name ?? 'Unknown';
                            $userNew = User::find($state)->name ?? 'Unknown';
                            $adminName = Auth::user()->name;

                            // Access the record from the Livewire component
                            $ticket = $livewire->record;
                            $comment = "Admin Update, the ticket's assigned user was changed from {$userOld} to {$userNew} by {$adminName}.";

                            app(TicketHistoryService::class)->recordHistory($ticket->id, $comment);
                        }
                    }),
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
                    ->sortable()->searchable()
                    ->beforeStateUpdated(function ($record, $state) {
                        $departmentOld = Department::find($record->department_id)->name ?? 'Unknown';
                        $departmentNew = Department::find($state)->name ?? 'Unknown';
                        $adminName = Auth::user()->name;
                        $comment = "Admin Update, the ticket's department was changed from {$departmentOld} to {$departmentNew} by {$adminName}.";
                        app(TicketHistoryService::class)->recordHistory($record->id, $comment);
                    }),

                SelectColumn::make('status_id')
                    ->label('Status')
                    ->options(Status::all()->pluck('name', 'id')->toArray())
                    ->sortable()->searchable()
                    ->beforeStateUpdated(function ($record, $state) {
                        $statusOld = Status::find($record->status_id)->name ?? 'Unknown';
                        $statusNew = Status::find($state)->name ?? 'Unknown';
                        $adminName = Auth::user()->name;
                        $comment = "Admin Update, the ticket's status was changed from {$statusOld} to {$statusNew} by {$adminName}.";
                        app(TicketHistoryService::class)->recordHistory($record->id, $comment);
                    }),

                SelectColumn::make('user_id')
                    ->label('Assigned To')
                    ->options(User::all()->pluck('name', 'id')->toArray())
                    ->sortable()->searchable()
                    ->beforeStateUpdated(function ($record, $state) {
                        $userOld = User::find($record->user_id)->name ?? 'Unknown';
                        $userNew = User::find($state)->name ?? 'Unknown';
                        $adminName = Auth::user()->name;
                        $comment = "Admin Update, the ticket's assigned user was changed from {$userOld} to {$userNew} by {$adminName}.";
                        app(TicketHistoryService::class)->recordHistory($record->id, $comment);
                    }),
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
