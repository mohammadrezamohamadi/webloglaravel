<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title></title>
</head>
<body>
<nav class="navbar navbar-expand-lg "  style="background-color: #008080;">
    <div class="container">

        @if(auth()->check())
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{auth()->user()->name}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="{{'posts/create'}}">Create Post</a></li>
                    <li><a class="dropdown-item" href="{{ route('posts.index')}}">Posts</a></li>
                    <li><a class="dropdown-item" href="#">Setting</a></li>
                    <li>
                        <form class="dropdown-item"method="post" action="{{ route('auth.logout') }}">
                            @csrf
                            <button class="btn-danger" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a class="btn btn-outline-success" href="{{ route('auth.form.login') }}">Login</a>


        <ul class="nav justify-content-end">

            <li class="nav-item">
                <a class="btn" href="{{('register')}}">Sign Up</a>
            </li>
            <li class="nav-item ">
                <a class="btn" href="{{ route('auth.form.login') }}">Sign In</a>
            </li>

        </ul>
            @endif


    </div>


</nav>


<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>
