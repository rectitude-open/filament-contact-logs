<?php

declare(strict_types=1);

namespace RectitudeOpen\FilamentContactLogs\Resources\ContactLogResource\Pages;

use Filament\Resources\Pages\ListRecords;
use RectitudeOpen\FilamentContactLogs\Resources\ContactLogResource;

class ListContactLogs extends ListRecords
{
    protected static string $resource = ContactLogResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
