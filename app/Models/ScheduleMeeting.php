<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'skype',
        'schedule_date',
        'schedule_time',
        'message',

    ];
}
