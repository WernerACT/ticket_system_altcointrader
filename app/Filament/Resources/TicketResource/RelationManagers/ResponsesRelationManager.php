<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResponsesRelationManager extends RelationManager
{
    protected static string $relationship = 'responses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('ticket')->relationship('ticket', 'reference')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ticket.reference')
            ->columns([
                Tables\Columns\TextColumn::make('ticket.reference'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('body')->limit(20),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ]);
    }
}
