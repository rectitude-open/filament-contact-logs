<?php

namespace RectitudeOpen\FilamentContactLogs\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RectitudeOpen\FilamentContactLogs\FilamentContactLogs
 */
class FilamentContactLogs extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \RectitudeOpen\FilamentContactLogs\FilamentContactLogs::class;
    }
}
