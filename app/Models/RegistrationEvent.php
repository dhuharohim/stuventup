<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationEvent extends Model
{
    use HasFactory;
    protected $table = "registration";
    protected $fillable = [
        'user_id',
        'profile_mhs_id',
        'profile_general_id',
        'event_id',
        'status_regist'
    ];
    public function profileMahasiswa(){
        return $this->belongsTo(ProfileMahasiswa::class, 'profile_mhs_id', 'id');
    }
    public function profileGeneral(){
        return $this->belongsTo(ProfileUmum::class, 'profile_general_id', 'id');
    }
    public function event(){
        return $this->belongsTo(EventForm::class, 'event_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
