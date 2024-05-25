<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CannedResponseResource\Pages;
use App\Filament\Resources\CannedResponseResource\RelationManagers;
use App\Models\CannedResponse;
use Faker\Provider\Text;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
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
            ->fill(function ($record, $request) {
                $keywords = collect(data_get($request, 'keywords'))->pluck('keyword')->toArray();
                $record->name = data_get($request, 'name');
                $record->department_id = data_get($request, 'department_id');
                $record->keywords = json_encode($keywords);
                $record->body = data_get($request, 'body');
                $record->save();
            })
            ->schema([
                TextInput::make('name')
                    ->required(),
                Select::make('department_id')
                    ->relationship('department', 'name'),
                Repeater::make('keywords')
                    ->schema([
                        TextInput::make('keyword')->required(),
                    ])->collapsible()->collapsed(),
                Forms\Components\Textarea::make('body')->autosize(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Title'),
                TextColumn::make('body')->limit(99),
                TextColumn::make('department.name'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListCannedResponses::route('/'),
            'create' => Pages\CreateCannedResponse::route('/create'),
            'edit' => Pages\EditCannedResponse::route('/{record}/edit'),
        ];
    }
}
