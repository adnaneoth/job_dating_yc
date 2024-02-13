<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class,'user_skill');
    }

    public function announce()
    {
        return $this->belongsToMany(Announcment::class,'announce_skill');
    }
    use HasFactory;

    protected $fillable = ['name'];

}
