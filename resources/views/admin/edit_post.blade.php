@extends('layout')
@section('title', 'Главная')
@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">
            <h1 class="my-4">Редактировать публикацию</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form
                style="display: flex; flex-direction: column; width: 80%"
                action="add_post" method="post" enctype="multipart/form-data">
                @csrf
                {{--}}{{csrf_field()}}--}}
                <select name="author_id">
                    @foreach($authors as $author)
                        <option @if($author->id == $post->author_id) selected @endif value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="id" value="">
                <input style="margin-top: 20px" type="text" placeholder="заголовок" name="title" value="{{$post->title}}">
                <textarea style="height:100px; margin-top: 20px" placeholder="текст новости" name="body" >{{$post->body}}</textarea>
                <input style=" margin-top: 20px" type="file" name="image">
                <input style=" margin-top: 20px" type="submit" value="Сохранить">
            </form>
    </div>
@endsection
