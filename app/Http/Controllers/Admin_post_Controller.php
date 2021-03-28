<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class Admin_post_Controller extends Controller
{
    public function add_post(Request $request){
        if(\Auth::check()){
            $authors = Author::all();
            $categories = Category::all();
            return view('admin.add_post', ['authors'=>$authors, 'categories'=>$categories]);
        }else{
            return redirect()->route('index');
        }
    }

    public function save_post(Request $request){
        if(\Auth::check()){
            if($request->method()== 'POST'){
                $this->validate($request, [
                    'author_id' => 'required | numeric',
                    'title' => 'required | max: 100 |min: 3',
                    'body' => 'required | max: 1500 |min: 3',
                    'image' => 'image'
                ]);
                $post = new Post();
                $post->author_id = $request->input('author_id');
                $post->title = $request->input('title');
                $post->body = $request->input('body');
                $image = $request->image;
                if($image){
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $post->image ='http://mydomen/images/'.$imageName;
                }
                $post->save();
                $post->category()->sync($request->input('category_id'), false);
                $post->category()->getRelated();
                return redirect()->route('single_post', $post->id);
            }
        }else{
            return redirect()->route('index');
        }
    }
    public function delete_post(Request $request){
        if(\Auth::check()){
            if($request->method()== 'DELETE'){
                $post = Post::find($request->input('id'));
                $post->delete();
                return back();
            } else{
                return view('admin.delete_post',['post'=>Post::all()]);
            }
        }else{
            return redirect()->route('index');
        }
    }
    public function edit_post($id){
        if(\Auth::check()){
            $post = Post::where('id', '=', $id)->first();
            $authors = Author::all();
            return view('admin.edit_post', ['post'=>$post, 'authors'=>$authors]);
        }else{
            return redirect()->route('index');
        }
    }
    public function edit_save(Request $request){
        if(\Auth::check()){
            if($request->method()== 'POST'){
                $this->validate($request, [
                    'author_id' => 'required | numeric',
                    'title' => 'required | max: 100 |min: 3',
                    'body' => 'required | max: 1500 |min: 3',
                    'image' => 'image'
                ]);
                $post = Post::find($request->input('id'));
                $post->author_id = $request->input('author_id');
                $post->title = $request->input('title');
                $post->body = $request->input('body');
                $image = $request->image;
                if($image){
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $post->image ='http://mydomen/images/'.$imageName;
                }
                $post->save();
                return redirect('/post/'.$post->id);
        }
        }else{
            return redirect()->route('index');
        }
    }
}
