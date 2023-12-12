<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>@yield('title', 'Mon Site')</title>
</head>
<body>
   <header>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.index') }}">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            @unless(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.loginform') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.registerform') }}">Register</a>
                </li>
            @endunless

            @if(Auth::check())
                <li class="nav-item">
                    <form method="POST" action="{{ route('auth.logOut') }}">
                        @csrf
                        <button class='btn btn-sm btn-danger' type="submit">Logout</button>
                    </form>
                </li>
            @endif
        </ul>
    </div>

    <div>
        @if (Auth::check())
            <p>Bienvenue, {{ Auth::user()->name }}!</p>
        @endif
    </div>
</nav>



    </header>
    <main>
    @yield('content')
    </main>
    <footer class="bg-light text-dark text-center ">
    <div class="container">
        <p>&copy; 2023 Mon Site</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>