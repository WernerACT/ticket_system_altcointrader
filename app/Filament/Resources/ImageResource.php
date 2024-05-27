<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageResource\Pages;
use App\Filament\Resources\ImageResource\RelationManagers;
use App\Models\Image;
use App\Models\ImageType;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;


class ImageResource extends Resource
{
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $model = Image::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                View::make('path')->view('filament.forms.image'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('imageable.reference')
                    ->label('Ticket Reference')
                    ->sortable()
                    ->searchable(),
                SelectColumn::make('image_type_id')
                    ->label('Image Type')
                    ->options(ImageType::all()->pluck('name', 'id')->toArray())
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
                SelectFilter::make('imageType')
                    ->relationship('imageType', 'name'),
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
            'index' => Pages\ListImages::route('/'),
            'create' => Pages\CreateImage::route('/create'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
            'view' => Pages\ViewImage::route('/{record}/show'),
        ];
    }
}
