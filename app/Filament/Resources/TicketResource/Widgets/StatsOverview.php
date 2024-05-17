<?php

namespace App\Filament\Resources\TicketResource\Widgets;

use App\Models\Response;
use App\Models\Ticket;
use Filament\Forms\Components\Section;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Tickets', Ticket::count()),
            Stat::make('Total Open Tickets', Ticket::whereNotIn('status_id', [5,6,7])->count()),
            Stat::make('Total Unopened Tickets', Ticket::where('status_id', '=', 1)->count()),
            Stat::make('Total Responses', Response::count()),
        ];
    }
}
