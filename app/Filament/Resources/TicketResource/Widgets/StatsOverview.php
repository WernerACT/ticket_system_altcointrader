<?php

namespace App\Filament\Resources\TicketResource\Widgets;

use App\Models\Ticket;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static string $view = 'filament.widgets.stats-overview';

    protected function getStats(): array
    {
        $department = $this->filters['department_id'] ?? null;
        $startDate = $this->filters['start_date'] ?? null;
        $endDate = $this->filters['end_date'] ?? null;

        // Get the filtered tickets query
        $tickets = $this->getFilteredTicketsQuery($department, $startDate, $endDate);

        return [
            Stat::make('Total Tickets', $tickets->count()),
            Stat::make('Total Open Tickets', $tickets->whereNotIn('status_id', [5, 6, 7])->count()),
            Stat::make('Total Unopened Tickets', $tickets->where('status_id', 1)->count()),
            Stat::make('Total Responses', $tickets->withCount('responses')->get()->sum('responses_count')),
            Stat::make('Total Unverified Images', $tickets->withCount('images')->get()->sum('images_count')),
            Stat::make('Total Unverified Documents', $tickets->withCount('documents')->get()->sum('documents_count')),
        ];
    }

    protected function getFilteredTicketsQuery($department, $startDate, $endDate)
    {
        return Ticket::query()
            ->when($department, fn($query) => $query->where('department_id', $department))
            ->when($startDate && $endDate, fn($query) => $query->whereBetween('created_at', [$startDate, $endDate]));
    }
}
