<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function post(){
        return $this->hasMany(Post::class);
    }
}
