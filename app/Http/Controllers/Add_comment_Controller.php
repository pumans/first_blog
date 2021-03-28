<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use PDO;


class Add_comment_Controller extends Controller
{
    public function save_comment(Request $request){
        if(\Auth::check()){
            if($request->method()== 'POST'){
                $this->validate($request, [
                    'user_id' => 'required | numeric',
                    'post_id' => 'required | numeric',
                    'body' => 'required | max: 1500 |min: 3',
                ]);
                $comment = new Comment();
                $comment->body = $request->post('body');
                $comment->user_id = $request->post('user_id');

                $comment->save();
                //Костыль!!!
                $dsn = 'mysql:host=127.0.0.1; dbname=blog';
                $user = 'mysql';
                $password = 'mysql';

                try {
                    $dbh = new PDO($dsn, $user, $password);
                } catch (PDOException $exception){
                    echo 'FAULT CONNECTION:' . $exception->getMessage();
                }
                $c_id = $comment->id;
                $p_id = $request->input('post_id');
                $dbh->query("INSERT INTO comment_post
                (comment_id, post_id) VALUES ('$c_id', '$p_id')");
                return redirect()->route('index');
            }
        }else{
            return redirect()->route('index');
        }

    }
}
