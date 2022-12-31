<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUmum extends Model
{
    use HasFactory;
    protected $table = "profile_general";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'handphone',
        'photo'
    ];
    public function user_id(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
