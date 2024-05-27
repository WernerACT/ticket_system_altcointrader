<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CannedResponseResource\Pages;
use App\Filament\Resources\CannedResponseResource\RelationManagers;
use App\Models\CannedResponse;
use App\Models\Category;
use App\Models\Status;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CannedResponseResource extends Resource
{
    protected static ?string $model = CannedResponse::class;

    protected static ?string $navigationGroup = 'Admin';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                Textarea::make('body')->autosize(),
                Select::make('department_id')
                    ->relationship('department', 'name'),
                Select::make('categories')
                    ->multiple()
                    ->relationship('categories', 'name'),
                Select::make('suggested_status_id')
                    ->label('Suggested Status')
                    ->relationship('suggestedStatus', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Title')->sortable()->searchable(),
                TextColumn::make('department.name')->sortable(),
                SelectColumn::make('suggested_status_id')
                    ->label('Suggested Status')
                    ->options(Status::all()->pluck('name', 'id')->toArray())
                    ->sortable()->searchable(),
                TextColumn::make('links_count')
                    ->label('Number of Links')
                    ->counts('links')
                    ->alignCenter()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('categories')->multiple()
                    ->relationship('categories', 'name'),
                SelectFilter::make('department')->relationship('department', 'name'),
                SelectFilter::make('suggestedStatus')->relationship('suggestedStatus', 'name'),
            ])->persistFiltersInSession()
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([

            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\LinksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCannedResponses::route('/'),
            'create' => Pages\CreateCannedResponse::route('/create'),
            'edit' => Pages\EditCannedResponse::route('/{record}/edit'),
        ];
    }
}
