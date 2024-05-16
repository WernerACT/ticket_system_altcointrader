<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentResource extends Resource
{
    protected static ?int $navigationSort = 4;

    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->placeholder('Name of the image'),
                Forms\Components\TextInput::make('path')->required()->placeholder('Path of the image'),
                Select::make('documentType')
                    ->relationship('documentType', 'name'),
                Forms\Components\Checkbox::make('is_valid')->default(false)->label('Is Valid'),
                Forms\Components\Checkbox::make('should_delete')->default(false)->label('Should Delete'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('documentType.name')->label('Type'),
                Tables\Columns\CheckboxColumn::make('is_valid'),
                Tables\Columns\CheckboxColumn::make('should_delete'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->searchable()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->searchable()->sortable(),
            ])
            ->filters([
                TernaryFilter::make('should_delete'),
                TernaryFilter::make('is_valid'),
                SelectFilter::make('documentType')
                    ->relationship('documentType', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
