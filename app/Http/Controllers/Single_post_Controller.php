<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class Single_post_Controller extends Controller
{
    public function __invoke($id){
        $post = Post::where('id', '=', $id)->first();
        return view('single_post', ['post'=>$post]);
    }
}
