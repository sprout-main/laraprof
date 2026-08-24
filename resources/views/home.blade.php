@extends('layouts.app')

@section('title', 'About Me')
@section('meta_description', 'Basic information, bio, and contact details of '.config('portfolio.name'))

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <img src="{{ asset('images/avatar.svg') }}" alt="Profile picture placeholder for {{ $profile['name'] }}" class="avatar" width="220" height="220">
        <div>
            <p class="eyebrow">{{ $profile['role'] }}</p>
            <h1>{{ $profile['name'] }}</h1>
            <p class="lead">{{ $profile['tagline'] }}</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="#contact">Contact details</a>
                <a class="btn btn-ghost" href="mailto:{{ $profile['email'] }}">Email me</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container narrow">
        <h2>About Me</h2>
        <p class="bio">{{ $profile['bio'] }}</p>
    </div>
</section>

<section class="section section-alt" id="contact">
    <div class="container narrow">
        <h2>Contact</h2>
        <p class="section-sub">Feel free to reach out through any of the following.</p>
        <div class="card-grid">
            <a class="contact-card" href="mailto:{{ $profile['email'] }}">
                <span class="contact-label">Email</span>
                <span class="contact-value">{{ $profile['email'] }}</span>
            </a>
            <a class="contact-card" href="tel:{{ $profile['phone'] }}">
                <span class="contact-label">Phone</span>
                <span class="contact-value">{{ $profile['phone'] }}</span>
            </a>
            <div class="contact-card static">
                <span class="contact-label">Location</span>
                <span class="contact-value">{{ $profile['location'] }}</span>
            </div>
        </div>
    </div>
</section>
@endsection
