<?php

declare(strict_types=1);

namespace RectitudeOpen\FilamentContactLogs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactLog extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'ip_address', 'user_agent'];
}
