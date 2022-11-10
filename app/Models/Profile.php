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
}
