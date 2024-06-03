<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>
<body>

{{-- Navigation bar --}}
<nav class="navbar is-info has-text-white" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ route('home') }}" class="navbar-item">
                <span class="has-text-white has-text-weight-bold is-size-3">ToDOoo</span>
            </a>
        </div>
        <div class="navbar-item">
            <a href="{{ route('home') }}" class="navbar-item">
                <span class="has-text-white has-text-weight-bold is-size-3">Task</span>
            </a>
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
