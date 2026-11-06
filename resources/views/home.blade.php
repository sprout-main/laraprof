@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section id="hero" class="min-h-[85vh] flex items-center justify-center px-6 pt-16">
    <div class="max-w-4xl mx-auto text-center">
        <div class="scroll-reveal motion-reveal">
            <p class="eyebrow-micro mb-4">{{ config('portfolio.brand.domain') }}</p>
            <h1 class="display-header mb-6 motion-kinetic-heading">
                Hi, I'm <span class="accent-foil">{{ config('portfolio.name') }}</span>
            </h1>
            <p class="body-prose max-w-2xl mx-auto mb-8">
                {{ config('portfolio.role') }}
            </p>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="#projects" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gradient-to-r from-amber-600 to-red-600 text-white font-semibold text-sm hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300" data-motion-magnetic="btn" data-motion-spring="btn">
                    View Projects
                    <span class="text-[10px]">↘</span>
                </a>
                <a href="mailto:{{ config('portfolio.email') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full border border-amber-500/30 dark:border-rose-500/40 text-stone-900 dark:text-stone-100 font-semibold text-sm hover:bg-amber-50 dark:hover:bg-rose-950/30 transition-all duration-300" data-motion-magnetic="btn" data-motion-spring="btn">
                    Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>

<section id="about" class="py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="scroll-reveal motion-reveal">
            <p class="eyebrow-micro mb-3">About Me</p>
            <div class="doppelwand" data-motion-tilt="card" data-motion-spring="card">
                <div class="doppelwand-core p-6 md:p-8">
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <div class="flex-shrink-0">
                            <div class="relative w-32 h-32 rounded-full border-4 border-amber-400/30 dark:border-rose-500/30 shadow-lg shadow-amber-500/10 overflow-hidden avatar-frame">
                                <img src="{{ asset('images/'.config('portfolio.profile_image')) }}" alt="{{ config('portfolio.name') }}" class="w-full h-full object-cover grayscale contrast-125 hover:grayscale-0 hover:contrast-100 transition-all duration-500 ease-out cursor-pointer" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                                <div class="w-full h-full bg-gradient-to-br from-amber-400 to-red-500 flex items-center justify-center text-white text-3xl font-bold" style="display:none;">{{ config('portfolio.initials') }}</div>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-stone-900 dark:text-stone-100 mb-3">{{ config('portfolio.name') }}</h2>
                            <p class="body-prose mb-4">{{ config('portfolio.bio') }}</p>
                            <div class="flex flex-wrap gap-2" data-motion-dock="true">
                                @foreach(config('portfolio.socials') as $platform => $url)
                                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border border-stone-200 dark:border-stone-800 text-stone-700 dark:text-stone-300 text-xs font-semibold hover:border-amber-400/60 dark:hover:border-rose-500/60 hover:shadow-[0_0_15px_rgba(220,38,38,0.1)] transition-all duration-300" data-motion-spring="btn" data-dock-item="true">
                                        @if($platform === 'github')
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                        @endif
                                        {{ ucfirst($platform) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="scroll-reveal motion-reveal mb-12">
            <p class="eyebrow-micro mb-3">Skills & Tools</p>
            <h2 class="text-3xl font-bold text-stone-900 dark:text-stone-100">Technical <span class="accent-foil">Arsenal</span></h2>
        </div>
        <div class="grid md:grid-cols-2 gap-6 motion-stagger-parent scroll-reveal-parent">
            @foreach(config('portfolio.skills') as $group)
                <div class="motion-stagger-item scroll-reveal-item doppelwand" data-motion-spring="card">
                    <div class="doppelwand-core p-6">
                        <h3 class="text-xs uppercase tracking-widest text-stone-500 dark:text-stone-400 font-bold mb-4">{{ $group['group'] }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($group['items'] as $skill)
                                @if(isset($skill['badge']))
                                    <span class="@if($skill['badge'] === 'gold') badge-gold @elseif($skill['badge'] === 'crimson') badge-crimson @else badge-pearl @endif">
                                        {{ $skill['name'] }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-stone-50 dark:bg-stone-900/60 border border-stone-200 dark:border-stone-800 text-stone-600 dark:text-stone-300">
                                        {{ is_array($skill) ? $skill['name'] : $skill }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="projects" class="py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="scroll-reveal motion-reveal mb-12">
            <p class="eyebrow-micro mb-3">Projects</p>
            <h2 class="text-3xl md:text-4xl font-bold text-stone-900 dark:text-stone-100 motion-kinetic-heading">Featured <span class="accent-foil">Work</span></h2>
            <p class="body-prose mt-2 max-w-2xl">
                Real-world web architectures, spatial data engines, and production systems engineered with full-stack PHP, spatial GIS, and modern reactive UIs.
            </p>
        </div>

        <div class="space-y-12">
            @foreach(config('portfolio.projects') as $project)
                @if($project['featured'])
                    <!-- Featured Spotlight Project Card -->
                    <div class="scroll-reveal motion-reveal doppelwand" data-project-card="{{ $project['id'] }}" data-motion-tilt="card" data-motion-spring="card">
                        <div class="doppelwand-core p-6 md:p-8">
                            
                            <!-- Header & Pill Badges -->
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-3 mb-6">
                                <div>
                                    <div class="flex items-center gap-2 mb-1.5">
                                        <span class="text-2xl">{{ $project['icon'] ?? '⚡' }}</span>
                                        <h3 class="text-xl md:text-2xl font-bold text-stone-900 dark:text-stone-100">{{ $project['name'] }}</h3>
                                    </div>
                                    <p class="text-xs font-mono text-amber-700 dark:text-amber-400 font-semibold uppercase tracking-wider">
                                        {{ $project['type'] }}
                                    </p>
                                </div>
                                <div class="flex flex-wrap items-center gap-1.5">
                                    @foreach($project['pills'] as $pill)
                                        <span class="pill-{{ $pill['variant'] }}">
                                            {{ $pill['label'] }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Dual-View Screenshot Showcase -->
                            @if(!empty($project['screenshots']))
                                <div class="mb-6">
                                    <!-- Interactive Monitor Bezel Preview -->
                                    <div class="screenshot-bezel group relative aspect-[16/9] overflow-hidden cursor-pointer"
                                         data-open-lightbox
                                         data-project-id="{{ $project['id'] }}"
                                         role="button"
                                         tabindex="0"
                                         aria-label="Open fullscreen screenshot lightbox for {{ $project['name'] }}">
                                        
                                        <!-- Active Image Display -->
                                        <img id="preview-img-{{ $project['id'] }}"
                                             src="{{ asset($project['screenshots'][0]['src']) }}" 
                                             alt="{{ $project['screenshots'][0]['title'] }}" 
                                             class="w-full h-full object-cover object-top grayscale contrast-110 group-hover:grayscale-0 group-hover:contrast-100 group-hover:scale-102 transition-all duration-500 ease-out"
                                             loading="lazy">
                                        
                                        <!-- Floating Badge on Preview -->
                                        <div class="absolute top-4 left-4 z-10">
                                            <span id="preview-badge-{{ $project['id'] }}" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-stone-900/80 backdrop-blur-md text-amber-400 text-xs font-mono font-bold border border-amber-500/30 shadow-lg">
                                                {{ $project['screenshots'][0]['badge'] }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Screenshot View Switcher Controls -->
                                    <div class="flex items-center justify-between gap-3 mt-3 px-1">
                                        <div class="flex items-center gap-2" data-motion-dock="true">
                                            <span class="text-[11px] font-mono text-stone-400 uppercase tracking-wider font-semibold">Views:</span>
                                            @foreach($project['screenshots'] as $idx => $ss)
                                                <button type="button" 
                                                        class="screenshot-thumb-btn {{ $idx === 0 ? 'active' : '' }}"
                                                        data-thumb-target="{{ $project['id'] }}"
                                                        data-index="{{ $idx }}"
                                                        data-src="{{ asset($ss['src']) }}"
                                                        data-badge="{{ $ss['badge'] }}"
                                                        data-title="{{ $ss['title'] }}"
                                                        aria-label="Switch to {{ $ss['title'] }}"
                                                        data-motion-spring="btn"
                                                        data-dock-item="true">
                                                    <span class="w-1.5 h-1.5 rounded-full thumb-indicator {{ $idx === 0 ? 'bg-amber-500' : 'bg-stone-300 dark:bg-stone-600' }}"></span>
                                                    <span>{{ $ss['badge'] }}</span>
                                                </button>
                                            @endforeach
                                        </div>

                                        <button type="button" 
                                                data-open-lightbox 
                                                data-project-id="{{ $project['id'] }}"
                                                class="text-xs font-mono font-semibold text-amber-700 dark:text-amber-400 hover:text-red-600 dark:hover:text-rose-400 transition-colors flex items-center gap-1"
                                                data-motion-spring="btn">
                                            <span>Expand</span>
                                            <span>⛶</span>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <!-- Description Prose -->
                            <p class="body-prose mb-6">
                                {{ $project['description'] }}
                            </p>

                            <!-- Tech Stack Chips -->
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach($project['stack'] as $tech)
                                    <span class="px-2.5 py-1 rounded-md bg-stone-100 dark:bg-stone-900 text-stone-700 dark:text-stone-300 text-xs font-mono font-semibold border border-stone-200 dark:border-stone-800">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-wrap items-center gap-3 pt-4 border-t border-stone-100 dark:border-stone-800/80">
                                @if($project['live_url'])
                                    <a href="{{ $project['live_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-amber-600 to-red-600 text-white font-bold text-xs hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300" data-motion-spring="btn">
                                        <span>Visit Live System</span>
                                        <span>↗</span>
                                    </a>
                                @endif
                                
                                @if(!empty($project['screenshots']))
                                    <button type="button" 
                                            data-open-lightbox 
                                            data-project-id="{{ $project['id'] }}"
                                            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full border border-stone-200 dark:border-stone-800 text-stone-800 dark:text-stone-200 font-semibold text-xs hover:border-amber-400/60 dark:hover:border-rose-500/60 transition-all duration-300 cursor-pointer"
                                            data-motion-spring="btn">
                                        <span>Showcase Gallery</span>
                                        <span>🖼️</span>
                                    </button>
                                @endif

                                @if($project['repo_url'])
                                    <a href="{{ $project['repo_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-full border border-stone-200 dark:border-stone-800 text-stone-700 dark:text-stone-300 font-semibold text-xs hover:border-amber-400/60 dark:hover:border-rose-500/60 transition-all duration-300" data-motion-spring="btn">
                                        <span>Source Code</span>
                                        <span>⌥</span>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                @else
                    <!-- Secondary System Card (Laraprof, Student DBMS) -->
                    <div class="scroll-reveal motion-reveal doppelwand" data-motion-spring="card">
                        <div class="doppelwand-core p-6">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-2 mb-3">
                                <div class="flex items-center gap-2">
                                    <span class="text-xl">{{ $project['icon'] ?? '⚡' }}</span>
                                    <h3 class="text-lg font-bold text-stone-900 dark:text-stone-100">{{ $project['name'] }}</h3>
                                </div>
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach($project['pills'] as $pill)
                                        <span class="pill-{{ $pill['variant'] }}">
                                            {{ $pill['label'] }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <p class="body-prose text-sm mb-4">
                                {{ $project['description'] }}
                            </p>

                            <div class="flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-stone-100 dark:border-stone-800/80">
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach($project['stack'] as $tech)
                                        <span class="px-2 py-0.5 rounded text-[11px] font-mono bg-stone-100 dark:bg-stone-900 text-stone-600 dark:text-stone-400 border border-stone-200 dark:border-stone-800">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>

                                @if($project['repo_url'])
                                    <a href="{{ $project['repo_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 dark:text-amber-400 hover:text-red-600 dark:hover:text-rose-400 transition-colors" data-motion-spring="btn">
                                        <span>View Code</span>
                                        <span>↗</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Inject Projects Data for JavaScript Lightbox -->
    @php
        $projectsWithAssetUrls = array_map(function($project) {
            if (!empty($project['screenshots'])) {
                $project['screenshots'] = array_map(function($ss) {
                    $ss['src'] = asset($ss['src']);
                    return $ss;
                }, $project['screenshots']);
            }
            return $project;
        }, config('portfolio.projects'));
    @endphp
    <script id="projects-data" type="application/json">
        {!! json_encode($projectsWithAssetUrls) !!}
    </script>
</section>

<section id="experience" class="py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="scroll-reveal motion-reveal mb-12">
            <p class="eyebrow-micro mb-3">Experience</p>
            <h2 class="text-3xl font-bold text-stone-900 dark:text-stone-100">Where I've <span class="accent-foil">Worked</span></h2>
        </div>
        <div class="space-y-6 motion-stagger-parent scroll-reveal-parent">
            @foreach(config('portfolio.experience') as $item)
                <div class="motion-stagger-item scroll-reveal-item doppelwand" data-motion-spring="card">
                    <div class="doppelwand-core p-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <div>
                                <h3 class="text-lg font-bold text-stone-900 dark:text-stone-100">{{ $item['role'] }}</h3>
                                <p class="text-amber-700 dark:text-amber-400 font-semibold text-sm">{{ $item['org'] }}</p>
                            </div>
                            <span class="text-xs font-mono font-bold uppercase tracking-wider text-stone-400 dark:text-stone-500 mt-1 md:mt-0">
                                {{ $item['period'] }}
                                @if(isset($item['location']))
                                    <span class="text-stone-300 dark:text-stone-600">·</span>
                                    <span class="text-stone-500 dark:text-stone-400">{{ $item['location'] }}</span>
                                @endif
                            </span>
                        </div>
                        @if(isset($item['hours']))
                            <span class="inline-block px-2 py-0.5 rounded-full bg-amber-50 dark:bg-amber-950/40 border border-amber-400/30 dark:border-amber-700/40 text-amber-800 dark:text-amber-300 text-[10px] font-bold uppercase tracking-wider mb-2">
                                {{ $item['hours'] }}
                            </span>
                        @endif
                        <ul class="mt-3 space-y-1.5">
                            @foreach($item['highlights'] as $line)
                                <li class="flex items-start gap-2 text-stone-600 dark:text-stone-300 text-sm">
                                    <span class="text-amber-500 dark:text-amber-400 mt-1.5 text-[8px]">●</span>
                                    {{ $line }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="education" class="py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="scroll-reveal motion-reveal mb-12">
            <p class="eyebrow-micro mb-3">Education</p>
            <h2 class="text-3xl font-bold text-stone-900 dark:text-stone-100">Academic <span class="accent-foil">Journey</span></h2>
        </div>
        <div class="space-y-6 mb-16 motion-stagger-parent scroll-reveal-parent">
            @foreach(config('portfolio.education') as $item)
                <div class="motion-stagger-item scroll-reveal-item doppelwand" data-motion-spring="card">
                    <div class="doppelwand-core p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <div>
                                <h3 class="text-lg font-bold text-stone-900 dark:text-stone-100">{{ $item['degree'] }}</h3>
                                <p class="text-amber-700 dark:text-amber-400 font-semibold text-sm">{{ $item['school'] }}</p>
                            </div>
                            <div class="flex items-center gap-2 mt-2 md:mt-0">
                                <span class="text-xs font-mono font-bold uppercase tracking-wider text-stone-400 dark:text-stone-500">
                                    {{ $item['period'] }}
                                </span>
                                @if($item['current'])
                                    <span class="inline-block px-2 py-0.5 rounded-full bg-amber-50 dark:bg-amber-950/40 border border-amber-400/30 dark:border-amber-700/40 text-amber-800 dark:text-amber-300 text-[10px] font-bold uppercase tracking-wider">
                                        Ongoing
                                    </span>
                                @endif
                            </div>
                        </div>
                        <p class="text-stone-500 dark:text-stone-400 text-sm mt-1">{{ $item['place'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Verified Accreditations: Certifications -->
        <div class="scroll-reveal motion-reveal mb-12">
            <p class="eyebrow-micro mb-2">Verified Accreditations</p>
            <h2 class="text-3xl font-bold text-stone-900 dark:text-stone-100 motion-kinetic-heading">Certifications</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-16 motion-stagger-parent scroll-reveal-parent">
            @foreach(config('portfolio.certifications') as $cert)
                <div class="motion-stagger-item scroll-reveal-item doppelwand flex flex-col justify-between" data-motion-tilt="card" data-motion-spring="card">
                    <div class="doppelwand-core p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <!-- Header / Year & ID -->
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="text-xs font-mono font-bold text-stone-400 dark:text-stone-500">
                                    {{ $cert['year'] }}
                                </span>
                                @if(isset($cert['cert_id']) && $cert['cert_id'])
                                    <span class="text-[10px] font-mono text-stone-400 dark:text-stone-500">
                                        ID: {{ $cert['cert_id'] }}
                                    </span>
                                @endif
                            </div>

                            <!-- Certificate Showcase Frame / Direct View Link -->
                            <div class="cert-frame group relative aspect-[16/10] overflow-hidden rounded-xl bg-stone-950 mb-4">
                                <a href="{{ asset($cert['pdf'] ?? $cert['image']) }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer" 
                                   class="block w-full h-full"
                                   title="Open {{ $cert['title'] }}">
                                    <img src="{{ asset($cert['image']) }}" 
                                         alt="{{ $cert['title'] }}" 
                                         class="w-full h-full object-cover object-top grayscale contrast-110 group-hover:grayscale-0 group-hover:contrast-100 transition-all duration-500 ease-out opacity-95 group-hover:opacity-100 select-none"
                                         loading="lazy">
                                </a>

                                <!-- Digital Badge Floating Seal (if present) -->
                                @if(isset($cert['badge_image']) && $cert['badge_image'])
                                    <div class="absolute top-2.5 right-2.5 w-11 h-11 rounded-full p-0.5 bg-white/90 dark:bg-stone-900/90 backdrop-blur shadow-lg border border-amber-400/40 pointer-events-none">
                                        <img src="{{ asset($cert['badge_image']) }}" alt="Badge" class="w-full h-full object-contain">
                                    </div>
                                @endif
                            </div>

                            <!-- Title & Issuer -->
                            <h3 class="text-base md:text-lg font-bold text-stone-900 dark:text-stone-100 mb-1 leading-snug">
                                {{ $cert['title'] }}
                            </h3>
                            <p class="text-xs font-semibold text-amber-700 dark:text-amber-400 mb-3 flex items-center gap-1.5">
                                <span>{{ $cert['icon'] ?? '📜' }}</span>
                                <span>{{ $cert['issuer'] }}</span>
                            </p>

                            <!-- Summary Narrative -->
                            <p class="text-xs text-stone-600 dark:text-stone-300 leading-relaxed">
                                {{ $cert['summary'] }}
                            </p>
                        </div>

                        <!-- Card Footer Action Controls -->
                        <div class="pt-4 mt-4 border-t border-stone-100 dark:border-stone-800/80 flex items-center justify-between gap-2">
                            @if(isset($cert['pdf']) && $cert['pdf'])
                                <a href="{{ asset($cert['pdf']) }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer" 
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-stone-100 dark:bg-stone-900 hover:bg-stone-200 dark:hover:bg-stone-800 text-stone-800 dark:text-stone-200 text-xs font-semibold transition-colors border border-stone-200 dark:border-stone-800"
                                   data-motion-spring="btn">
                                    <span>View Document (PDF)</span>
                                    <span class="text-amber-600 dark:text-rose-400">↗</span>
                                </a>
                            @else
                                <a href="{{ asset($cert['image']) }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer" 
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-stone-100 dark:bg-stone-900 hover:bg-stone-200 dark:hover:bg-stone-800 text-stone-800 dark:text-stone-200 text-xs font-semibold transition-colors border border-stone-200 dark:border-stone-800"
                                   data-motion-spring="btn">
                                    <span>View Certificate</span>
                                    <span class="text-amber-600 dark:text-rose-400">↗</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="scroll-reveal motion-reveal mb-12">
            <p class="eyebrow-micro mb-3">Languages</p>
            <h2 class="text-3xl font-bold text-stone-900 dark:text-stone-100">Spoken <span class="accent-foil">Languages</span></h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 motion-stagger-parent scroll-reveal-parent">
            @foreach(config('portfolio.languages') as $lang)
                <div class="motion-stagger-item scroll-reveal-item doppelwand" data-motion-spring="card">
                    <div class="doppelwand-core p-5 text-center">
                        <p class="font-bold text-stone-900 dark:text-stone-100 text-sm mb-1">{{ $lang['name'] }}</p>
                        <span class="inline-block px-2 py-0.5 rounded-full bg-stone-50 dark:bg-stone-900/60 border border-stone-200 dark:border-stone-800 text-stone-500 dark:text-stone-400 text-[10px] font-semibold">
                            {{ $lang['level'] }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="connect" class="py-24 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <div class="scroll-reveal motion-reveal">
            <p class="eyebrow-micro mb-3">Get in Touch</p>
            <h2 class="text-3xl font-bold text-stone-900 dark:text-stone-100 mb-4 motion-kinetic-heading">Let's Build Something <span class="accent-foil">Together</span></h2>
            <p class="body-prose max-w-lg mx-auto mb-8">
                I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="mailto:{{ config('portfolio.email') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-amber-600 to-red-600 text-white font-bold text-sm hover:shadow-xl hover:shadow-amber-500/25 transition-all duration-300" data-motion-magnetic="btn" data-motion-spring="btn">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Email Me
                </a>
                <a href="{{ config('portfolio.socials.github') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-stone-200 dark:border-stone-800 text-stone-900 dark:text-stone-100 font-bold text-sm hover:border-amber-400/60 dark:hover:border-rose-500/60 hover:shadow-[0_0_25px_rgba(220,38,38,0.1)] transition-all duration-300" data-motion-magnetic="btn" data-motion-spring="btn">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    GitHub
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
