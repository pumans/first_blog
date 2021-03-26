<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function comment(){
        return $this->belongsToMany(Comment::class);
    }
}
