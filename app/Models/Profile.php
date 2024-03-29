<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = "profile";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'email',
        'handphone'
    ];
    public function user_id(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    public function event(){
        return $this->hasMany(EventForm::class, 'profile_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
