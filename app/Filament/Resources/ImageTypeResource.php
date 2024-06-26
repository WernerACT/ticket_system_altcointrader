<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageTypeResource\Pages;
use App\Filament\Resources\ImageTypeResource\RelationManagers;
use App\Models\ImageType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageTypeResource extends Resource
{
    protected static ?string $navigationGroup = 'Admin';

    protected static ?string $model = ImageType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListImageTypes::route('/'),
            'create' => Pages\CreateImageType::route('/create'),
            'edit' => Pages\EditImageType::route('/{record}/edit'),
        ];
    }
}
