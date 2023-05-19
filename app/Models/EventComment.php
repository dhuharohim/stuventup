<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventComment extends Model
{
    use HasFactory;
    protected $table = "event_comment";
    
    protected $fillable = [
        'user_id',
        'event_forms_id',
        'comment'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function eventForms() {
        return $this->hasOne(EventForm::class, 'id', 'event_forms_id');
    }

}
