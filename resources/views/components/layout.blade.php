@props([
    'title' => '',
])

    <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title !== '' ? "{$title} | " . config('app.name') : config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <x-icon src="logo.svg" alt="" width="30" height="24"
                    class="d-inline-block align-text-top color-light" />
            Larapics

        </a>
        <ul class="navbar-nav ms-auto">
            @guest
                <li class="nav-item me-2">
                    <a class="btn btn-danger" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item me-2">
                    <a class="btn btn-outline-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
{{ $slot }}
<footer class="bg-light text-muted py-3 mt-5 border-top">
    <div class="container-fluid">
        <p class="float-end mb-1">
            <a href="#" class="text-decoration-none">Back to top</a>
        </p>
        <p>Larapics provides beautiful, high quality & royalty free photos shared by creators everywhere.</p>
        <p>&copy; {{ now()->format('Y') }} {{ config('app.name') }}</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
        crossorigin="anonymous"></script>
</body>

</html>
