@extends('layouts.app')

@section('title', 'Experience & Skills')
@section('meta_description', 'Work experience, skills, and languages of '.config('portfolio.name'))

@section('content')
<section class="page-head">
    <div class="container narrow">
        <p class="eyebrow">Experience &amp; Skills</p>
        <h1>Where I've Worked</h1>
        <p class="lead">Hands-on experience from municipal service and fast-paced retail, backed by a growing technical toolkit.</p>
    </div>
</section>

<section class="section">
    <div class="container narrow">
        <div class="panel">
            <div class="panel-head">
                <h2>Work Experience</h2>
            </div>
            <div class="panel-body">
                <div class="entry-list">
                    @foreach ($experience as $item)
                        <article class="entry">
                            <span class="period">{{ $item['period'] }}</span>
                            <h3>{{ $item['role'] }} &middot; {{ $item['org'] }}</h3>
                            <p>{{ $item['place'] }}</p>
                            <ul class="highlights">
                                @foreach ($item['highlights'] as $line)
                                    <li>{{ $line }}</li>
                                @endforeach
                            </ul>
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
                <h2>Skills</h2>
            </div>
            <div class="panel-body">
                <div class="skill-groups">
                    @foreach ($skills as $group)
                        <div class="skill-group">
                            <h3>{{ $group['group'] }}</h3>
                            <div class="chips">
                                @foreach ($group['items'] as $skill)
                                    <span class="chip">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
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
                <h2>Languages</h2>
            </div>
            <div class="panel-body">
                <div class="lang-grid">
                    @foreach ($languages as $lang)
                        <div class="lang-card">
                            <span class="lang-name">{{ $lang['name'] }}</span>
                            <span class="chip level">{{ $lang['level'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
