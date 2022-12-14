<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMahasiswa extends Model
{
    use HasFactory;
    protected $table = "profile_mhs";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'study_program',
        'email',
        'handphone',
        'photo'
    ];
    public function user_id(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
