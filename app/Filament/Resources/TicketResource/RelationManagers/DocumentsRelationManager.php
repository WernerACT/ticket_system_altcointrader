<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use App\Models\DocumentType;
use Filament\Forms;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                View::make('path')->view('filament.forms.document'),
            ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('documentable')
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('documentable.reference')
                    ->label('Ticket Reference')
                    ->sortable()
                    ->searchable(),
                SelectColumn::make('document_type_id')
                    ->label('Document Type')
                    ->options(DocumentType::all()->pluck('name', 'id')->toArray())
                    ->sortable()->searchable(),
                Tables\Columns\ToggleColumn::make('is_valid')
                    ->label('Is Valid')
                    ->onColor('success')
                    ->offColor('danger'),
                Tables\Columns\ToggleColumn::make('should_delete')
                    ->label('Should Delete')
                    ->onColor('success')
                    ->offColor('danger'),
                Tables\Columns\TextColumn::make('updated_at')
            ])
            ->filters([
                //
            ])
            ->headerActions([

            ])
            ->actions([
                Tables\Actions\ViewAction::make()->modalWidth(MaxWidth::SevenExtraLarge),
            ])
            ->bulkActions([

            ]);
    }

}
