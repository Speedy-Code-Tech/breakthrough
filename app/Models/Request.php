<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'service_requests';
    protected  $fillable = [
        'requesting_party',
        'mobile_number',
        'email_address',
        'activity_title',
        'coverage',
        'event_description',
        'program_highlights',
        'date',
        'time',
        'venue',
        'notes',
        'status'
    ];
}
