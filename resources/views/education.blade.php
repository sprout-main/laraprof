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
        <div class="panel">
            <div class="panel-head">
                <h2>Education</h2>
            </div>
            <div class="panel-body">
                <div class="entry-list">
                    @foreach ($education as $item)
                        <article class="entry">
                            <span class="period">{{ $item['period'] }}@if($item['current']) <em class="badge">Ongoing</em>@endif</span>
                            <h3>{{ $item['degree'] }}</h3>
                            <p>{{ $item['school'] }} &middot; {{ $item['place'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container narrow">
        <div class="panel">
            <div class="panel-head">
                <h2>Certifications</h2>
            </div>
            <div class="panel-body">
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
        </div>
    </div>
</section>
@endsection
