<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class APITokens extends Page
{
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.api-tokens';

    protected static ?string $title = 'API Tokens';

    protected static ?string $slug = 'api-tokens';
}
