<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationEvent extends Model
{
    use HasFactory;
    protected $table = "registration";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'profile_mhs_id',
        'profile_general_id',
        'event_id',
        'status_regist'
    ];
    public function profile_mhs_id(){
        return $this->belongsTo(ProfileMahasiswa::class, 'profile_mhs_id', 'id');
    }
    public function profile_general_id(){
        return $this->belongsTo(ProfileUmum::class, 'profile_general_id', 'id');
    }
    public function event_id(){
        return $this->belongsTo(EventForm::class, 'event_id', 'id');
    }
    public function user_id(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
