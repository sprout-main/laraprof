<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Personal portfolio of '.config('portfolio.name'))">
    <title>@yield('title', 'Home') | {{ config('portfolio.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header class="site-header">
    <nav class="nav container">
        <a href="{{ route('home') }}" class="brand">jake<span>mandi</span></a>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}"@if(request()->routeIs('home')) class="active"@endif>Home</a></li>
            <li><a href="{{ route('education') }}"@if(request()->routeIs('education')) class="active"@endif>Education</a></li>
            <li><a href="{{ route('experience') }}"@if(request()->routeIs('experience')) class="active"@endif>Experience</a></li>
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container footer-inner">
        <p>&copy; {{ date('Y') }} {{ config('portfolio.name') }}</p>
        <a href="mailto:{{ config('portfolio.email') }}">{{ config('portfolio.email') }}</a>
    </div>
</footer>
</body>
</html>
