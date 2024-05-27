<?php

namespace App\Filament\Pages;

use App\Models\Department;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

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
}
