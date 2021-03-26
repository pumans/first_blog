<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li>
                    <form action="mail_subscriber" method="post">
                        <input type="email" name="email">
                        <input type="submit" value="Подписться">
                    </form>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">Про нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('services')}}">Сервис</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contacts')}}">Контакты</a>
                </li>
                @if(\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('save_post')}}">Администрирование</a>
                    </li>
                @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">@if(\Auth::check()){{\Auth::user()->name}}
                            @else Вход @endif</a>
                    </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
    @yield('content')

    <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @inject('categories', 'App\Category_for_sidebar')
                                <div>
                                    {{$categories->get_category()}}
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Social_networks Widget -->
            <div class="card my-4">
                <h5 class="card-header">Мы в социальных сетях</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @inject('social', 'App\Social_for_sidebar')
                                <div>
                                    {{$social->get_social()}}
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    @inject('currency', 'App\Get_currency')
                    {{$currency->get_currency()}}
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

