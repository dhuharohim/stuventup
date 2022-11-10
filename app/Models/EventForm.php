<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_activity',
        'desc_activity',
        'date_activity',
        'img_activity',
        'ticket_activity',
    ];
}
