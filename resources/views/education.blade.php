@extends('layouts.app')

@section('title', 'Education & Credentials')

@section('content')

<section class="py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="scroll-reveal motion-reveal mb-12">
            <p class="eyebrow-micro mb-3">Education</p>
            <h2 class="text-3xl font-bold text-stone-900 dark:text-stone-100 motion-kinetic-heading">Academic <span class="accent-foil">Journey</span></h2>
        </div>

        <div class="space-y-6 mb-16 motion-stagger-parent scroll-reveal-parent">
            @foreach(config('portfolio.education') as $item)
                <div class="motion-stagger-item scroll-reveal-item doppelwand" data-motion-tilt="card" data-motion-spring="card">
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
    </div>
</section>

@endsection
