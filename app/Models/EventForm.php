<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventForm extends Model
{
    use HasFactory;
    protected $table = "event_forms";
    
    protected $fillable = [
        'name_activity',
        'desc_activity',
        'date_activity',
        'time_start_activity',
        'time_end_activity',
        'place_activity',
        'status_activity',
        'img_activity',
        'type_activity',
        'ticket',
        'price_ticket',
        'name_pic',
        'contact_pic',
        'other_type'
    ];
}
