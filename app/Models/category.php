<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function blogs(){
        return $this->hasMany('App\Models\blog');
    }
}
