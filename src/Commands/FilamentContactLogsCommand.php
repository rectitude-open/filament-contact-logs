<?php

declare(strict_types=1);

namespace RectitudeOpen\FilamentContactLogs\Commands;

use Illuminate\Console\Command;

class FilamentContactLogsCommand extends Command
{
    public $signature = 'filament-contact-logs';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
