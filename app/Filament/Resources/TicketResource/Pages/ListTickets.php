<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use App\Models\Department;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Resources\Pages\ListRecords;

class ListTickets extends ListRecords
{
    use HasFiltersForm;

    protected static string $resource = TicketResource::class;

    public function filtersForm(Form $form): Form
    {
        return $form->schema([
            Section::make('Filters')->schema([
                Select::make('department_id')
                    ->label('Department')
                    ->placeholder('Please select a department')
                    ->options(Department::all()->pluck('name', 'id'))
                    ->searchable(),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
            ])->columns(3)

        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
