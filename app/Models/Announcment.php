<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcment extends Model
{
    public function skill()
    {
        return $this->belongsToMany(Skill::class,'announce_skill');
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'user_announce');
    }

    use HasFactory;
    protected $fillable = ['title', 'description','companie_id'];
}
