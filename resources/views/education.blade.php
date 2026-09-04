@extends('layouts.app')

@section('title', 'Education')

@section('content')

<section class="py-24 px-6">
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

        <div class="grid md:grid-cols-2 gap-6">
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
    </div>
</section>

@endsection
