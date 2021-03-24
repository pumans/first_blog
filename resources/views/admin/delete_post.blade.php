@extends('layout')
@section('title', 'Главная')
@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Удалить публикацию</h1>
        <table class="table table-hover-dark">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            </thead>
            <tbody>
            @foreach($post as $post1)
                <tr>
                    <td scope="row">{{$post1->id}}</td>
                    <td scope="row">{{$post1->title}}</td>
                    <td>
                        <form action="/admin/edit_post/{{$post1->id}}" method="get">
                            <input type="hidden" name="id" value="{{$post1->id}}">
                            <button type="submit" class="btn btn-outline-primary">Редактировать</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <input type="hidden" name="id" value="{{$post1->id}}">
                            <button type="submit" class="btn btn-outline-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
