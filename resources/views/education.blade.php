@extends('layouts.app')

@section('title', 'Education')
@section('meta_description', 'Educational background and certifications of '.config('portfolio.name'))

@section('content')
<section class="page-head">
    <div class="container narrow">
        <p class="eyebrow">Educational Background</p>
        <h1>Schools &amp; Certifications</h1>
        <p class="lead">My academic journey and the credentials I have earned along the way.</p>
    </div>
</section>

<section class="section">
    <div class="container narrow">
        <h2>Education</h2>
        <div class="timeline">
            @foreach ($education as $item)
                <article class="timeline-item">
                    <span class="timeline-dot"></span>
                    <div class="timeline-card">
                        <span class="period">{{ $item['period'] }}@if($item['current']) <em class="badge">Ongoing</em>@endif</span>
                        <h3>{{ $item['degree'] }}</h3>
                        <p>{{ $item['school'] }} &middot; {{ $item['place'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container narrow">
        <h2>Certifications</h2>
        <p class="section-sub">Degrees, seminars, and certificates earned.</p>
        <div class="cert-list">
            @foreach ($certifications as $cert)
                <div class="cert-card">
                    <span class="cert-year">{{ $cert['year'] }}</span>
                    <div>
                        <h3>{{ $cert['title'] }}</h3>
                        <p>Issued by {{ $cert['issuer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
