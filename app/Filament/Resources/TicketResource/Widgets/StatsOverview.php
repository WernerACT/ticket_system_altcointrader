<?php

namespace App\Filament\Resources\TicketResource\Widgets;

use App\Models\Document;
use App\Models\Image;
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
            Stat::make('Total Unverified Images', Image::where('image_type_id', '=', 1)->count()),
            Stat::make('Total Unverified Documents', Document::where('document_type_id', '=', 1)->count()),
        ];
    }
}
