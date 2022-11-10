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
        'email',
        'handphone'
    ];
    public function user_id(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
