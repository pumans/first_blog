@extends('layout')
@section('title', 'Главная')
@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Публикация: {{$post->id}}</h1>

        <!-- Blog Post -->

        <div class="card mb-4">
            <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{$post->body}}</p>
            </div>
            <div class="card-footer text-muted">
                Опубликовал {{$post->created_at}}:
                <a href="{{route('posts_by_author', $post->author->key)}}">{{$post->author->name}}</a>
            </div>
            <div class="card-footer text-muted">
                Катигории:
                @foreach($post->category as $category)
                    <a href="{{route('posts_by_category', $category->key)}}">{{$category->category}} </a>
                @endforeach
            </div>
        </div>
        @if(\Auth::check())
        <div class="card mb-4">
            @foreach($post->comment as $comment)
                <div class="card-body">
                    <p class="card-text">{{$comment->body}}</p>
                </div>
                <div class="card-footer text-muted">
                    Комментарий опубликовал
                    @foreach($users as $user)
                        @if($user->id = $comment->user_id)
                            {{$user->name}}
                        @endif
                    @endforeach
                    в {{$comment->created_at}}.
                </div>
            @endforeach
        </div>
        <div class="card mb-4">
            <form action="save_comment" method="post" enctype="multipart/form-data">
                @csrf
                <p>Оставьте ваш комментарий</p>
                <textarea style="width: 100%; height: 100px" name="body"></textarea>
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="hidden" name="user_id" value="{{\Auth::user()->id}}">
                <input style=" margin-top: 20px" type="submit" value="Комментировать">
            </form>
        </div>
        @else <p>Зарегестрируйтесь чтобы видеть коментарии</p>
        @endif
    </div>
@endsection
