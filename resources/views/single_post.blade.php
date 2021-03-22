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
    </div>
@endsection
