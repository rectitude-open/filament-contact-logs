<?php

declare(strict_types=1);

namespace RectitudeOpen\FilamentContactLogs;

use Filament\Contracts\Plugin;
use Filament\Panel;
use RectitudeOpen\FilamentContactLogs\Resources\ContactLogResource;

class FilamentContactLogsPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-contact-logs';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                config('filament-contact-logs.filament_resource', ContactLogResource::class),
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
