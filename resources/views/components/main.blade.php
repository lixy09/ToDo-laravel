<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TODO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>

<body>
{{-- Navigation bar --}}
<nav class="navbar is-info has-text-white" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ route('welcome') }}" class="navbar-item">
                <span class="has-text-white has-text-weight-bold is-size-3">ToDOoo</span>
            </a>
        </div>
        <div class="navbar-start">
{{--            @auth--}}
                <a href="{{ route('tasks.index') }}" class="navbar-item is-active">
                    <span class="has-text-white is-size-5">Task</span>
                </a>
{{--            @endauth--}}
        </div>

        <div class="navbar-end">
            @guest()
                <a href="{{ route('login') }}" class="navbar-item">
                    <span class="has-text-white is-size-5">Login</span>
                </a>
                <a href="{{ route('register') }}" class="navbar-item">
                    <span class="has-text-white is-size-5">Register</span>
                </a>
            @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link has-text-white is-size-5">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="navbar-dropdown">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="navbar-item">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>

{{-- Content --}}
<section class="section">
    <div class="container">
        <x-success-message></x-success-message>
        <x-error-message></x-error-message>
        {{ $slot }}
    </div>
</section>
</body>
</html>
