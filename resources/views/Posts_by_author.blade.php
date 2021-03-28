@extends('layout')
@section('title', 'Главная')
@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Автор: {{$author->name}}</h1>

        <!-- Blog Post -->
        @foreach($author->post as $post)
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{mb_substr($post->body, 0, 150)}}...</p>
                    <a href="{{route('single_post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Опубликовано {{Date::parse($post->created_at)->format('d F Y в H:i')}}.
                </div>
                <div class="card-footer text-muted">
                    Катигории:
                    @foreach($post->category as $category)
                        <a href="{{route('posts_by_category', $category->key)}}">{{$category->category}} </a>
                    @endforeach
                </div>
            </div>
    @endforeach
    <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>
    </div>
@endsection
