<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\ImageType;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentResource extends Resource
{
    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                View::make('path')->view('filament.forms.document'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                TernaryFilter::make('should_delete'),
                TernaryFilter::make('is_valid'),
                SelectFilter::make('documentType')
                    ->relationship('documentType', 'name'),
            ])->persistFiltersInSession()
            ->actions([
                Tables\Actions\ViewAction::make()->modalWidth(MaxWidth::Full),
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
            'view' => Pages\ViewDocument::route('/{record}/show'),
        ];
    }
}
