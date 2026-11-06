<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Portfolio of '.config('portfolio.name'))">
    <meta name="color-scheme" content="dark light">
    <title>@yield('title', 'Home') | {{ config('portfolio.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;800;900&family=Instrument+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&family=Special+Elite&display=swap" rel="stylesheet">
    
    <!-- Zero-FOUC Theme Initialization Script (Default: Dark Mode) -->
    <script>
        try {
            const savedTheme = localStorage.getItem('laraprof-theme');
            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
                document.querySelector('meta[name="color-scheme"]').content = 'light';
            } else {
                document.documentElement.classList.add('dark');
                document.querySelector('meta[name="color-scheme"]').content = 'dark';
            }
        } catch (e) {}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="transition-colors duration-300 relative selection:bg-red-900 selection:text-white">

    <!-- 35mm Film Reel Scroll Progress Scrubber -->
    <div id="film-reel-progress" class="fixed top-0 left-0 right-0 h-1 bg-gradient-to-r from-red-600 via-rose-500 to-amber-500 origin-left z-[70] scale-x-0" aria-hidden="true"></div>

    <!-- Analog CRT Scanlines & Flashlight Vignette Atmosphere -->
    <div class="crt-scanlines" aria-hidden="true"></div>
    <div class="flashlight-vignette" aria-hidden="true"></div>

    <!-- WebGL Spectral Mist & Embers Canvas -->
    <div id="webgl-bg" class="pointer-events-none fixed inset-0 z-0 opacity-60 dark:opacity-80 transition-opacity duration-500" aria-hidden="true"></div>

    <nav class="fixed top-4 left-1/2 -translate-x-1/2 z-50 w-[94%] max-w-4xl">
        <div class="glass-nav relative flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-mono text-sm font-bold tracking-wider text-stone-900 dark:text-stone-100 hover:text-red-600 dark:hover:text-rose-400 transition-colors chromatic-hover" data-motion-magnetic="btn" data-motion-spring="btn">
                <span class="text-amber-600 dark:text-amber-400">sprout</span><span class="text-stone-400 dark:text-stone-500">.</span><span class="text-red-600 dark:text-rose-500">free.nf</span>
            </a>
            
            <div id="nav-links-container" class="relative hidden md:flex items-center space-x-1 text-xs uppercase tracking-widest text-stone-600 dark:text-stone-300 font-semibold p-1">
                <!-- Motion Smooth Tabs Sliding Pill Indicator -->
                <div id="nav-spring-pill" class="absolute pointer-events-none rounded-full bg-amber-500/15 dark:bg-rose-500/25 border border-amber-500/30 dark:border-rose-500/50 opacity-0 -z-1" style="will-change: transform, width, height, opacity;"></div>

                <a href="#about" class="nav-link px-3 py-1.5 rounded-full hover:text-amber-700 dark:hover:text-amber-300 transition-colors">About</a>
                <a href="#skills" class="nav-link px-3 py-1.5 rounded-full hover:text-amber-700 dark:hover:text-amber-300 transition-colors">Skills</a>
                <a href="#projects" class="nav-link px-3 py-1.5 rounded-full hover:text-amber-700 dark:hover:text-amber-300 transition-colors">Projects</a>
                <a href="#experience" class="nav-link px-3 py-1.5 rounded-full hover:text-amber-700 dark:hover:text-amber-300 transition-colors">Experience</a>
                <a href="#education" class="nav-link px-3 py-1.5 rounded-full hover:text-amber-700 dark:hover:text-amber-300 transition-colors">Education & Certs</a>
            </div>

            <div class="flex items-center gap-2">
                <!-- Motion Command Palette Trigger (⌘K) -->
                <button id="cmd-palette-trigger" type="button" class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-stone-100 dark:bg-stone-900 border border-stone-200 dark:border-stone-800 text-[11px] font-mono text-stone-500 dark:text-stone-400 hover:border-amber-400/60 dark:hover:border-rose-500/60 hover:text-stone-800 dark:hover:text-stone-200 transition-colors cursor-pointer" title="Quick Navigation (Ctrl+K)" data-motion-spring="btn">
                    <span>⌘K</span>
                </button>

                <!-- Theme Toggle Switch -->
                <button id="theme-toggle" type="button" class="theme-toggle-btn w-9 h-9 rounded-full flex items-center justify-center text-stone-700 dark:text-stone-200 transition-all hover:scale-105 active:scale-95" aria-label="Toggle Theme" title="Toggle Theme" data-motion-magnetic="btn" data-motion-spring="btn">
                    <span class="dark:hidden text-sm" aria-hidden="true">🍷</span>
                    <span class="hidden dark:inline text-sm" aria-hidden="true">☀️</span>
                </button>

                <a href="mailto:{{ config('portfolio.email') }}" class="group flex items-center gap-2 pl-3 sm:pl-4 pr-1.5 py-1.5 rounded-full bg-gradient-to-r from-amber-500/15 via-red-500/10 to-amber-500/15 hover:from-amber-500/25 hover:to-red-500/20 text-stone-900 dark:text-stone-100 text-xs font-semibold border border-amber-500/30 dark:border-rose-500/40 transition-all shadow-sm" data-motion-magnetic="btn" data-motion-spring="btn">
                    <span class="hidden sm:inline">Get in Touch</span>
                    <span class="sm:hidden">✉</span>
                    <span class="w-6 h-6 rounded-full bg-gradient-to-tr from-red-600 to-amber-500 text-white flex items-center justify-center transition-transform group-hover:translate-x-0.5 shadow-sm text-[10px]">↗</span>
                </a>
            </div>
        </div>
    </nav>

    <main class="relative z-10 pt-24">
        @yield('content')
    </main>

    <footer class="relative z-10 border-t border-amber-400/20 dark:border-red-900/30 mt-32 transition-colors">
        <div class="max-w-4xl mx-auto px-6 py-8 text-center">
            <p class="text-stone-500 dark:text-stone-400 text-sm">
                &copy; {{ date('Y') }} {{ config('portfolio.name') }} ·
                <a href="mailto:{{ config('portfolio.email') }}" class="text-amber-700 dark:text-amber-400 font-semibold hover:text-red-600 dark:hover:text-rose-400 transition-colors">{{ config('portfolio.email') }}</a>
            </p>
        </div>
    </footer>

    <!-- Imperial Unified Lightbox Modal -->
    <div id="project-lightbox" class="fixed inset-0 z-[100] hidden items-center justify-center p-3 md:p-6 bg-stone-950/85 dark:bg-black/90 backdrop-blur-xl transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true" aria-labelledby="lightbox-title">
        <div class="projector-dialog relative w-full max-w-6xl 2xl:max-w-7xl bg-white/95 dark:bg-[#1c0b11]/98 rounded-[2rem] border border-amber-400/40 dark:border-red-900/60 shadow-2xl shadow-stone-950/70 overflow-hidden flex flex-col max-h-[95vh] transition-colors">
            
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-stone-200/70 dark:border-red-950/70 bg-stone-50/80 dark:bg-[#14070c]/90">
                <div class="flex items-center gap-3">
                    <span id="lightbox-icon" class="text-2xl">🗺️</span>
                    <div>
                        <h3 id="lightbox-title" class="text-base md:text-lg font-bold text-stone-900 dark:text-stone-100 leading-tight">Preview</h3>
                        <p id="lightbox-subtitle" class="text-xs font-mono text-amber-700 dark:text-rose-400 font-semibold">Details</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span id="lightbox-counter" class="text-xs font-mono text-stone-500 dark:text-stone-300 font-bold bg-white dark:bg-[#250d16] px-2.5 py-1 rounded-full border border-stone-200 dark:border-red-900/40">1 / 1</span>
                    <button id="lightbox-close" type="button" class="w-8 h-8 rounded-full bg-stone-200/80 dark:bg-stone-800 hover:bg-red-500 hover:text-white dark:hover:bg-rose-600 text-stone-700 dark:text-stone-200 flex items-center justify-center transition-all cursor-pointer text-sm font-bold" aria-label="Close modal" data-motion-spring="btn">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Image Viewport -->
            <div class="relative flex-1 bg-stone-950 flex items-center justify-center overflow-hidden min-h-[360px] md:min-h-[540px] p-2 md:p-4">
                <img id="lightbox-img" src="" alt="" class="max-h-[78vh] md:max-h-[82vh] w-auto max-w-full object-contain select-none">
                
                <!-- Navigation Arrows -->
                <button id="lightbox-prev" type="button" class="absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-stone-900/80 hover:bg-amber-500 dark:hover:bg-rose-600 text-white flex items-center justify-center transition-all cursor-pointer backdrop-blur shadow-lg text-xl border border-white/10" aria-label="Previous image" data-motion-spring="btn">
                    ‹
                </button>
                <button id="lightbox-next" type="button" class="absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-stone-900/80 hover:bg-amber-500 dark:hover:bg-rose-600 text-white flex items-center justify-center transition-all cursor-pointer backdrop-blur shadow-lg text-xl border border-white/10" aria-label="Next image" data-motion-spring="btn">
                    ›
                </button>
            </div>

            <!-- Modal Footer / Details -->
            <div class="px-6 py-4 bg-white dark:bg-[#180a0f] border-t border-stone-200/70 dark:border-red-950/70 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <p id="lightbox-caption" class="text-sm text-stone-600 dark:text-rose-100/80 leading-relaxed max-w-2xl">
                    Detailed preview of the platform interface.
                </p>

                <div id="lightbox-actions" class="flex items-center gap-2 flex-shrink-0">
                    <a id="lightbox-live-link" href="#" target="_blank" rel="noopener noreferrer" class="hidden items-center gap-1.5 px-4 py-2 rounded-full bg-gradient-to-r from-amber-500 via-amber-600 to-red-600 hover:from-amber-600 hover:to-red-700 text-white text-xs font-semibold shadow-md shadow-amber-500/20 transition-all" data-motion-spring="btn">
                        <span>Visit Platform</span>
                        <span>↗</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 35mm Cinema Command Palette (⌘K) Inspired by Motion.dev Examples -->
    <div id="cmd-palette" class="fixed inset-0 z-[120] hidden items-start justify-center pt-20 md:pt-28 px-4 bg-stone-950/80 backdrop-blur-md transition-opacity duration-200" role="dialog" aria-modal="true" aria-label="Command Palette">
        <div class="cmd-palette-dialog w-full max-w-xl rounded-2xl bg-white/95 dark:bg-[#1c0b11]/98 border border-amber-400/40 dark:border-red-900/60 shadow-2xl overflow-hidden doppelwand">
            <div class="doppelwand-core p-4">
                <!-- Search Input Bar -->
                <div class="flex items-center gap-3 px-3 py-2 border-b border-stone-200 dark:border-stone-800 mb-3">
                    <span class="text-amber-600 dark:text-amber-400 text-sm">🔍</span>
                    <input id="cmd-palette-input" type="text" placeholder="Jump to section, project, or action... (e.g. S.O.M.M.S, Certs, Dark)" class="w-full bg-transparent text-sm text-stone-900 dark:text-stone-100 placeholder-stone-400 dark:placeholder-stone-500 focus:outline-none font-mono">
                    <span class="text-[10px] font-mono px-1.5 py-0.5 rounded bg-stone-100 dark:bg-stone-800 text-stone-500 dark:text-stone-400 border border-stone-200 dark:border-stone-700">ESC</span>
                </div>

                <!-- Suggestions / Items List -->
                <div id="cmd-palette-list" class="max-h-72 overflow-y-auto space-y-1 font-mono text-xs">
                    <!-- Nav Jump Points -->
                    <div class="px-3 py-1 text-[10px] uppercase tracking-wider text-amber-700 dark:text-amber-400 font-bold">Navigation</div>
                    <a href="#about" class="cmd-item flex items-center justify-between px-3 py-2 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800/80 text-stone-700 dark:text-stone-300 hover:text-stone-900 dark:hover:text-white transition-colors cursor-pointer" data-cmd-key="about me profile bio">
                        <span>👤 About Me</span>
                        <span class="text-[10px] text-stone-400 font-mono">#about</span>
                    </a>
                    <a href="#projects" class="cmd-item flex items-center justify-between px-3 py-2 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800/80 text-stone-700 dark:text-stone-300 hover:text-stone-900 dark:hover:text-white transition-colors cursor-pointer" data-cmd-key="projects featured work systems">
                        <span>⚡ Featured Projects</span>
                        <span class="text-[10px] text-stone-400 font-mono">#projects</span>
                    </a>
                    <a href="#skills" class="cmd-item flex items-center justify-between px-3 py-2 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800/80 text-stone-700 dark:text-stone-300 hover:text-stone-900 dark:hover:text-white transition-colors cursor-pointer" data-cmd-key="skills tools technical arsenal stack">
                        <span>🛠️ Technical Arsenal</span>
                        <span class="text-[10px] text-stone-400 font-mono">#skills</span>
                    </a>
                    <a href="#experience" class="cmd-item flex items-center justify-between px-3 py-2 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800/80 text-stone-700 dark:text-stone-300 hover:text-stone-900 dark:hover:text-white transition-colors cursor-pointer" data-cmd-key="experience background roles history">
                        <span>💼 Professional Background</span>
                        <span class="text-[10px] text-stone-400 font-mono">#experience</span>
                    </a>
                    <a href="#education" class="cmd-item flex items-center justify-between px-3 py-2 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800/80 text-stone-700 dark:text-stone-300 hover:text-stone-900 dark:hover:text-white transition-colors cursor-pointer" data-cmd-key="education credentials certifications accredited">
                        <span>📜 Verified Accreditations & Education</span>
                        <span class="text-[10px] text-stone-400 font-mono">#education</span>
                    </a>
                    <a href="#connect" class="cmd-item flex items-center justify-between px-3 py-2 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800/80 text-stone-700 dark:text-stone-300 hover:text-stone-900 dark:hover:text-white transition-colors cursor-pointer" data-cmd-key="contact connect email message">
                        <span>✉️ Get in Touch</span>
                        <span class="text-[10px] text-stone-400 font-mono">#connect</span>
                    </a>

                    <!-- Spotlight Projects -->
                    <div class="px-3 py-1 text-[10px] uppercase tracking-wider text-rose-600 dark:text-rose-400 font-bold mt-2">Projects</div>
                    @foreach(config('portfolio.projects') as $p)
                        <div class="cmd-item flex items-center justify-between px-3 py-2 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800/80 text-stone-700 dark:text-stone-300 hover:text-stone-900 dark:hover:text-white transition-colors cursor-pointer" data-cmd-key="{{ strtolower($p['name']) }} {{ strtolower($p['type'] ?? '') }}" data-cmd-action="project" data-project-id="{{ $p['id'] }}">
                            <span class="flex items-center gap-2">
                                <span>{{ $p['icon'] ?? '⚡' }}</span>
                                <span class="font-bold">{{ $p['name'] }}</span>
                            </span>
                            <span class="text-[10px] text-amber-700 dark:text-amber-400 font-semibold">{{ $p['type'] ?? 'Project' }}</span>
                        </div>
                    @endforeach

                    <!-- Quick Controls -->
                    <div class="px-3 py-1 text-[10px] uppercase tracking-wider text-stone-500 font-bold mt-2">Theme & Display</div>
                    <div id="cmd-toggle-theme" class="cmd-item flex items-center justify-between px-3 py-2 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800/80 text-stone-700 dark:text-stone-300 hover:text-stone-900 dark:hover:text-white transition-colors cursor-pointer" data-cmd-key="theme dark light mode toggle">
                        <span>🌗 Toggle Celluloid Dark / Porcelain Light Theme</span>
                        <span class="text-[10px] text-stone-400 font-mono">Action</span>
                    </div>
                </div>

                <!-- Footer Hint -->
                <div class="px-3 pt-3 mt-2 border-t border-stone-200 dark:border-stone-800 flex items-center justify-between text-[10px] font-mono text-stone-400">
                    <span>Navigate with ↑ ↓ and Enter</span>
                    <span>35mm Cinema Viewfinder</span>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
