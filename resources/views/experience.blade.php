@extends('layouts.app')

@section('title', 'Experience & Skills')

@section('content')

<section class="py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="scroll-reveal mb-12">
            <p class="eyebrow-micro mb-3">Experience</p>
            <h2 class="text-3xl font-bold text-stone-900">Professional <span class="accent-foil">Background</span></h2>
        </div>

        <div class="space-y-6 mb-24">
            @foreach(config('portfolio.experience') as $item)
                <div class="scroll-reveal doppelwand">
                    <div class="doppelwand-core p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-3">
                            <div>
                                <h3 class="text-lg font-bold text-stone-900">{{ $item['role'] }}</h3>
                                <p class="text-amber-700 font-semibold text-sm">{{ $item['org'] }}</p>
                            </div>
                            <span class="text-xs font-mono font-bold uppercase tracking-wider text-stone-400 mt-2 md:mt-0">
                                {{ $item['period'] }}
                                @if(isset($item['location']))
                                    <span class="text-stone-300">·</span>
                                    <span class="text-stone-500">{{ $item['location'] }}</span>
                                @endif
                            </span>
                        </div>
                        @if(isset($item['hours']))
                            <span class="inline-block px-2 py-0.5 rounded-full bg-amber-50 border border-amber-400/30 text-amber-800 text-[10px] font-bold uppercase tracking-wider mb-3">
                                {{ $item['hours'] }}
                            </span>
                        @endif
                        <ul class="space-y-2">
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

        <div class="scroll-reveal mb-12">
            <p class="eyebrow-micro mb-3">Skills</p>
            <h2 class="text-3xl font-bold text-stone-900">Technical <span class="accent-foil">Arsenal</span></h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-24">
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

@endsection
