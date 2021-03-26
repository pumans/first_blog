<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class Single_post_Controller extends Controller
{
    public function __invoke($id){
        if(\Auth::check()){
        $post = Post::where('id', '=', $id)->first();
        $users = User::all();
        return view('single_post', ['post'=>$post, 'users'=>$users]);
        }else{
            $post = Post::where('id', '=', $id)->first();
            return view('single_post', ['post'=>$post]);
        }
    }
}
