<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResponseResource\Pages;
use App\Filament\Resources\ResponseResource\RelationManagers;
use App\Models\Response;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Laravel\Prompts\text;

class ResponseResource extends Resource
{
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'created_at';

    protected static ?string $model = Response::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('ticket_id')->relationship('ticket', 'reference'),
                Forms\Components\Select::make('user_id')->relationship('user', 'name'),
                Forms\Components\Textarea::make('body')->autosize(),
                Forms\Components\DateTimePicker::make('created_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ticket.reference')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('body')->sortable()->limit(50)->searchable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()->dateTime()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()->dateTime()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->searchable()->sortable(),
            ])
            ->filters([
                SelectFilter::make('user')
                    ->relationship('user', 'name')->searchable(),
                SelectFilter::make('ticket')
                    ->relationship('ticket', 'reference')->searchable(),
            ])->persistFiltersInSession()
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
            ]);
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
            'index' => Pages\ListResponses::route('/'),
            'create' => Pages\CreateResponse::route('/create'),
            'edit' => Pages\EditResponse::route('/{record}/edit'),
        ];
    }
}
