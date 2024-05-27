<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkResource\Pages;
use App\Models\Link;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LinkResource extends Resource
{
    use InteractsWithPageFilters;

    protected static ?string $model = Link::class;

    protected static ?string $slug = 'links';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('URL Title')
                    ->required(),
                TextInput::make('url')
                    ->label('URL')
                    ->required()
                    ->url(),
                Select::make('canned_response_id')
                    ->label('Associated Canned Response')
                    ->relationship('cannedResponse', 'name')
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextInputColumn::make('title')
                    ->rules(['required'])
                    ->searchable()
                    ->sortable(),
                TextInputColumn::make('url')
                    ->label('URL')
                    ->rules([
                        'required', 'url'
                    ])
                    ->searchable()
                    ->type('url')
                    ->sortable(),
                TextColumn::make('cannedResponse.name')
                    ->label('Associated Canned Response')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
            'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['cannedResponse']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'cannedResponse.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->cannedResponse) {
            $details['CannedResponse'] = $record->cannedResponse->name;
        }

        return $details;
    }
}
