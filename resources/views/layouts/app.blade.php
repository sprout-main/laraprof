<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Portfolio of '.config('portfolio.name'))">
    <title>@yield('title', 'Home') | {{ config('portfolio.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-porcelain">

    <div id="webgl-bg" class="pointer-events-none fixed inset-0 z-0 opacity-60" aria-hidden="true"></div>

    <nav class="fixed top-4 left-1/2 -translate-x-1/2 z-50 w-[92%] max-w-4xl">
        <div class="glass-nav flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-mono text-sm font-bold tracking-wider text-stone-900 hover:text-red-600 transition-colors">
                <span class="text-amber-600">jake</span><span class="text-stone-400">.</span><span class="text-red-600">free.nf</span>
            </a>
            <div class="hidden md:flex items-center space-x-6 text-xs uppercase tracking-widest text-stone-600 font-semibold">
                <a href="#about" class="hover:text-amber-700 transition-colors">About</a>
                <a href="#skills" class="hover:text-amber-700 transition-colors">Skills</a>
                <a href="#projects" class="hover:text-amber-700 transition-colors">Projects</a>
                <a href="#experience" class="hover:text-amber-700 transition-colors">Experience</a>
            </div>
            <a href="mailto:{{ config('portfolio.email') }}" class="group flex items-center gap-2 pl-4 pr-1.5 py-1.5 rounded-full bg-gradient-to-r from-amber-500/15 via-red-500/10 to-amber-500/15 hover:from-amber-500/25 hover:to-red-500/20 text-stone-900 text-xs font-semibold border border-amber-500/30 transition-all shadow-sm">
                <span class="hidden sm:inline">Get in Touch</span>
                <span class="sm:hidden">✉</span>
                <span class="w-6 h-6 rounded-full bg-gradient-to-tr from-red-600 to-amber-500 text-white flex items-center justify-center transition-transform group-hover:translate-x-0.5 shadow-sm text-[10px]">↗</span>
            </a>
        </div>
    </nav>

    <main class="relative z-10 pt-24">
        @yield('content')
    </main>

    <footer class="relative z-10 border-t border-amber-400/20 mt-32">
        <div class="max-w-4xl mx-auto px-6 py-8 text-center">
            <p class="text-stone-500 text-sm">
                &copy; {{ date('Y') }} {{ config('portfolio.name') }} ·
                <a href="mailto:{{ config('portfolio.email') }}" class="text-amber-700 font-semibold hover:text-red-600 transition-colors">{{ config('portfolio.email') }}</a>
            </p>
        </div>
    </footer>

</body>
</html>
