<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function blog(){
        return $this->belongsTo(blog::class,'blog_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    // count comments for each blog post
    public static function countComments($blog_id){
        return static::where('blog_id', $blog_id)->count();
    }
}
