<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $table = "social";
    // public $timestamps = false;
    protected $fillable = [
        'profile_id',
        'social_name',
        'social_link'
    ];
    public function profile(){
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
}
