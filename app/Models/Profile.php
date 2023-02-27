<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory,SoftDeletes;
    public function home(){
        return $this->hasOne(Home::class);
    }
    public function about(){
        return $this->hasOne(About::class);
    }
    public function education(){
        return $this->hasMany(Education::class);
    }
    public function portfolio(){
        return $this->hasMany(Portfolio::class);
    }
}
