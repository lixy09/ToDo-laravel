<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>
<body>

<section class="section has-text-centered">
    <div class="section">
        <h1 class="title is-3">Uh-Oh...</h1>
        <p class="subtitle mt-5">
            @yield('message1')
{{--            Sorry, the page you are looking for could not be found.--}}
        </p>
    </div>
    <div class="container has-text-centered">
        <h1 class="title is-size-1 mt-5">
            @yield('code')
        </h1>
        <p class="subtitle is-6 mt-5">
            Error: <span class="has-text-danger">@yield('message')</span>
        </p>
        <br>
        @yield('content')
        <a href="{{ route('home') }}" class="button is-primary">Back to homepage</a>
    </div>
</section>
</body>
</html>
