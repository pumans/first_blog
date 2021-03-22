<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class Posts_by_category_Controller extends Controller
{
    public function __invoke($key){
        $category = Category::where('key', '=', $key)->first();
        return view('posts_by_category', ['category'=>$category]);
    }
}
