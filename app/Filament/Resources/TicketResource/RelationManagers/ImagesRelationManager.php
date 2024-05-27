<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use App\Models\ImageType;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                View::make('path')->view('filament.forms.image'),
            ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('imageable')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
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
                //
            ])
            ->headerActions([
//
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->modalWidth(MaxWidth::SevenExtraLarge),
            ])
            ->bulkActions([
                //
            ]);
    }
}
