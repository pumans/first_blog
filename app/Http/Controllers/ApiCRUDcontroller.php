<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class ApiCRUDcontroller extends Controller
{
    public function show(){
        return response()->json(\App\Post::paginate(), 200);
    }
    public function singleShow($id){
        try{
            $news = \App\Post::findOrFail($id);
        }
        catch (Exception $ex){
            return response()->json(['Msg'=>'not found'], 404);
        }
        return response()->json($news, 200);
    }
    public function create(Request $request){
        $post = new \App\Post();
        $post->author_id = $request->post('author_id');
        $post->title = $request->post('title');
        $post->body = $request->post('body');
        $post->image = $request->post('image');
        $post->save();
        return response()->json($post, 201);
    }

    public function redact(Request $request, $id){
        $post = \App\Post::find($id);
        $post->author_id = $request->post('author_id');
        $post->title = $request->post('title');
        $post->body = $request->post('body');
        $post->image = $request->post('image');
        $post->save();
        return response()->json($post, 200);
    }
    public function delete($id){
        try{
            $post = \App\Post::find($id);
        }
        catch (Exception $ex){
            return response()->json(['Msg'=>'not found'], 404);
        }
        $post->delete();
        return response()->json(['msg'=>'post deleted'], 200);
    }
}
