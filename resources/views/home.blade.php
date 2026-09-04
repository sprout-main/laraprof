@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section id="hero" class="min-h-[85vh] flex items-center justify-center px-6 pt-16">
    <div class="max-w-4xl mx-auto text-center">
        <div class="scroll-reveal">
            <p class="eyebrow-micro mb-4">{{ config('portfolio.brand.domain') }}</p>
            <h1 class="display-header mb-6">
                Hi, I'm <span class="accent-foil">{{ config('portfolio.name') }}</span>
            </h1>
            <p class="body-prose max-w-2xl mx-auto mb-8">
                {{ config('portfolio.role') }}
            </p>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="#projects" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gradient-to-r from-amber-600 to-red-600 text-white font-semibold text-sm hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 island-hover">
                    View Projects
                    <span class="text-[10px]">↘</span>
                </a>
                <a href="mailto:{{ config('portfolio.email') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full border border-amber-500/30 text-stone-900 font-semibold text-sm hover:bg-amber-50 transition-all duration-300 island-hover">
                    Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>

<section id="about" class="py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="scroll-reveal">
            <p class="eyebrow-micro mb-3">About Me</p>
            <div class="doppelwand">
                <div class="doppelwand-core p-6 md:p-8">
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <div class="flex-shrink-0">
                            <div class="relative w-32 h-32 rounded-full border-4 border-amber-400/30 shadow-lg shadow-amber-500/10 overflow-hidden">
                                <img src="{{ asset('images/'.config('portfolio.profile_image')) }}" alt="{{ config('portfolio.name') }}" class="w-full h-full object-cover" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                                <div class="w-full h-full bg-gradient-to-br from-amber-400 to-red-500 flex items-center justify-center text-white text-3xl font-bold" style="display:none;">{{ config('portfolio.initials') }}</div>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-stone-900 mb-3">{{ config('portfolio.name') }}</h2>
                            <p class="body-prose mb-4">{{ config('portfolio.bio') }}</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach(config('portfolio.socials') as $platform => $url)
                                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border border-stone-200 text-stone-700 text-xs font-semibold hover:border-amber-400/60 hover:shadow-[0_0_15px_rgba(220,38,38,0.1)] transition-all duration-300 island-hover">
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
        <div class="scroll-reveal mb-12">
            <p class="eyebrow-micro mb-3">Skills & Tools</p>
            <h2 class="text-3xl font-bold text-stone-900">Technical <span class="accent-foil">Arsenal</span></h2>
        </div>
        <div class="grid md:grid-cols-2 gap-6">
            @foreach(config('portfolio.skills') as $group)
                <div class="scroll-reveal doppelwand">
                    <div class="doppelwand-core p-6">
                        <h3 class="text-xs uppercase tracking-widest text-stone-500 font-bold mb-4">{{ $group['group'] }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($group['items'] as $skill)
                                @if(isset($skill['badge']))
                                    <span class="@if($skill['badge'] === 'gold') badge-gold @elseif($skill['badge'] === 'crimson') badge-crimson @else badge-pearl @endif">
                                        {{ $skill['name'] }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-stone-50 border border-stone-200 text-stone-600">
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
        <div class="scroll-reveal mb-12">
            <p class="eyebrow-micro mb-3">Projects</p>
            <h2 class="text-3xl font-bold text-stone-900">Featured <span class="accent-foil">Work</span></h2>
        </div>
        @foreach(config('portfolio.projects') as $project)
            <div class="scroll-reveal doppelwand mb-8">
                <div class="doppelwand-core p-6 md:p-8">
                    <div class="flex flex-col md:flex-row gap-6 items-start">
                        <div class="flex-1">
                            <p class="eyebrow-micro mb-2">{{ $project['type'] }}</p>
                            <h3 class="text-xl font-bold text-stone-900 mb-3">{{ $project['name'] }}</h3>
                            <p class="body-prose mb-4">{{ $project['description'] }}</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($project['pills'] as $pill)
                                    <span class="@if($pill['variant'] === 'gold') pill-gold @elseif($pill['variant'] === 'crimson') pill-crimson @else pill-pearl @endif">
                                        {{ $pill['label'] }}
                                    </span>
                                @endforeach
                            </div>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($project['stack'] as $tech)
                                    <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase tracking-wider bg-stone-100 text-stone-500">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-full md:w-48 h-32 rounded-2xl gradient-wash flex items-center justify-center">
                            <span class="text-4xl">🦷</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section id="experience" class="py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="scroll-reveal mb-12">
            <p class="eyebrow-micro mb-3">Experience</p>
            <h2 class="text-3xl font-bold text-stone-900">Where I've <span class="accent-foil">Worked</span></h2>
        </div>
        <div class="space-y-6">
            @foreach(config('portfolio.experience') as $item)
                <div class="scroll-reveal doppelwand">
                    <div class="doppelwand-core p-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <div>
                                <h3 class="text-lg font-bold text-stone-900">{{ $item['role'] }}</h3>
                                <p class="text-amber-700 font-semibold text-sm">{{ $item['org'] }}</p>
                            </div>
                            <span class="text-xs font-mono font-bold uppercase tracking-wider text-stone-400 mt-1 md:mt-0">
                                {{ $item['period'] }}
                                @if(isset($item['location']))
                                    <span class="text-stone-300">·</span>
                                    <span class="text-stone-500">{{ $item['location'] }}</span>
                                @endif
                            </span>
                        </div>
                        @if(isset($item['hours']))
                            <span class="inline-block px-2 py-0.5 rounded-full bg-amber-50 border border-amber-400/30 text-amber-800 text-[10px] font-bold uppercase tracking-wider mb-2">
                                {{ $item['hours'] }}
                            </span>
                        @endif
                        <ul class="mt-3 space-y-1.5">
                            @foreach($item['highlights'] as $line)
                                <li class="flex items-start gap-2 text-stone-600 text-sm">
                                    <span class="text-amber-500 mt-1.5 text-[8px]">●</span>
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
        <div class="scroll-reveal mb-12">
            <p class="eyebrow-micro mb-3">Education</p>
            <h2 class="text-3xl font-bold text-stone-900">Academic <span class="accent-foil">Journey</span></h2>
        </div>
        <div class="space-y-6 mb-16">
            @foreach(config('portfolio.education') as $item)
                <div class="scroll-reveal doppelwand">
                    <div class="doppelwand-core p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <div>
                                <h3 class="text-lg font-bold text-stone-900">{{ $item['degree'] }}</h3>
                                <p class="text-amber-700 font-semibold text-sm">{{ $item['school'] }}</p>
                            </div>
                            <div class="flex items-center gap-2 mt-2 md:mt-0">
                                <span class="text-xs font-mono font-bold uppercase tracking-wider text-stone-400">
                                    {{ $item['period'] }}
                                </span>
                                @if($item['current'])
                                    <span class="inline-block px-2 py-0.5 rounded-full bg-amber-50 border border-amber-400/30 text-amber-800 text-[10px] font-bold uppercase tracking-wider">
                                        Ongoing
                                    </span>
                                @endif
                            </div>
                        </div>
                        <p class="text-stone-500 text-sm mt-1">{{ $item['place'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="scroll-reveal mb-12">
            <p class="eyebrow-micro mb-3">Certifications</p>
            <h2 class="text-3xl font-bold text-stone-900">Credentials & <span class="accent-foil">Awards</span></h2>
        </div>
        <div class="grid md:grid-cols-2 gap-6 mb-16">
            @foreach(config('portfolio.certifications') as $cert)
                <div class="scroll-reveal doppelwand">
                    <div class="doppelwand-core p-6 flex items-start gap-4">
                        <div class="flex-shrink-0 w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-400 to-red-500 flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-amber-500/20">
                            {{ $cert['year'] }}
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-stone-900 mb-1">{{ $cert['title'] }}</h3>
                            <p class="text-stone-500 text-sm">{{ $cert['issuer'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="scroll-reveal mb-12">
            <p class="eyebrow-micro mb-3">Languages</p>
            <h2 class="text-3xl font-bold text-stone-900">Spoken <span class="accent-foil">Languages</span></h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach(config('portfolio.languages') as $lang)
                <div class="scroll-reveal doppelwand">
                    <div class="doppelwand-core p-5 text-center">
                        <p class="font-bold text-stone-900 text-sm mb-1">{{ $lang['name'] }}</p>
                        <span class="inline-block px-2 py-0.5 rounded-full bg-stone-50 border border-stone-200 text-stone-500 text-[10px] font-semibold">
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
        <div class="scroll-reveal">
            <p class="eyebrow-micro mb-3">Get in Touch</p>
            <h2 class="text-3xl font-bold text-stone-900 mb-4">Let's Build Something <span class="accent-foil">Together</span></h2>
            <p class="body-prose max-w-lg mx-auto mb-8">
                I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="mailto:{{ config('portfolio.email') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-amber-600 to-red-600 text-white font-bold text-sm hover:shadow-xl hover:shadow-amber-500/25 transition-all duration-300 island-hover">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Email Me
                </a>
                <a href="{{ config('portfolio.socials.github') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-stone-200 text-stone-900 font-bold text-sm hover:border-amber-400/60 hover:shadow-[0_0_25px_rgba(220,38,38,0.1)] transition-all duration-300 island-hover">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    GitHub
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
