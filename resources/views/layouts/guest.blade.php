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
<div class="container section">
    <div class="has-text-centered">
        <a href="{{ route('welcome') }}" class="has-text-info has-text-weight-bold is-size-2">ToDOoo</a>
    </div>
    <div class="mt-5">
        {{ $slot }}
    </div>
</div>
</body>
</html>
