<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#071416">
    <meta name="color-scheme" content="dark">
    <meta name="robots" content="noindex">
    <title>@yield('title', 'HASIN')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
</head>
<body class="error-body">
    <main class="error-stage">
        <a href="{{ url('/') }}" class="error-brand" aria-label="HASIN home">
            <span class="hasin-mark hasin-mark--special" aria-hidden="true">
                @include('partials.hasin-mark', ['markId' => 'error'])
            </span>
            <span class="error-brand-word">HASIN</span>
        </a>

        <p class="error-code">@yield('code')</p>
        <h1 class="error-title">@yield('heading')</h1>
        <p class="error-lead">@yield('message')</p>

        <div class="error-actions">
            <a href="{{ url('/') }}" class="btn btn-primary">Back home</a>
            <a href="{{ url('/contact') }}" class="btn btn-ghost">Contact</a>
        </div>
    </main>
</body>
</html>
