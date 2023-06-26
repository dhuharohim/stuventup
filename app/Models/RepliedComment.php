<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliedComment extends Model
{
    use HasFactory;
    protected $table = "replied_comment";
    
    protected $fillable = [
        'user_id',
        'event_forms_id',
        'comment',
        'profile_id',
        'profile_mhs_id',
        'profile_genereal_id',
        'event_comment_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function eventForms() {
        return $this->hasOne(EventForm::class, 'id', 'event_forms_id');
    }

    public function eventComment() {
        return $this->belongsTo(EventComment::class, 'id', 'event_comment_id');
    }

    public function profile() {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    public function profileMhs() {
        return $this->belongsTo(ProfileMahasiswa::class, 'profile_mhs_id', 'id');
    }

    public function profileGeneral() {
        return $this->belongsTo(ProfileUmum::class, 'profile_general_id', 'id');
    }
}
