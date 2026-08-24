@extends('layouts.app')

@section('title', 'About Me')
@section('meta_description', 'Basic information, bio, and contact details of '.config('portfolio.name'))

@section('content')
<section class="profile-header">
    <div class="container">
        <div class="cover-band" role="presentation"></div>
        <div class="profile-panel">
            <img src="{{ asset('images/avatar.svg') }}" alt="Profile picture placeholder for {{ $profile['name'] }}" class="avatar" width="168" height="168">
            <div class="profile-meta">
                <h1>{{ $profile['name'] }}</h1>
                <p class="profile-role">{{ $profile['role'] }}</p>
                <p class="profile-tagline">{{ $profile['tagline'] }}</p>
            </div>
            <div class="profile-actions">
                <a class="btn btn-primary" href="#contact">Contact details</a>
                <a class="btn btn-secondary" href="mailto:{{ $profile['email'] }}">Email me</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container narrow">
        <div class="panel">
            <div class="panel-head">
                <h2>About Me</h2>
            </div>
            <div class="panel-body">
                <p class="bio">{{ $profile['bio'] }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="contact">
    <div class="container narrow">
        <div class="panel">
            <div class="panel-head">
                <h2>Contact Information</h2>
            </div>
            <div class="panel-body">
                <table class="info-table">
                    <tbody>
                        <tr>
                            <th scope="row">Email:</th>
                            <td><a href="mailto:{{ $profile['email'] }}">{{ $profile['email'] }}</a></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td><a href="tel:{{ $profile['phone'] }}">{{ $profile['phone'] }}</a></td>
                        </tr>
                        <tr>
                            <th scope="row">Location:</th>
                            <td>{{ $profile['location'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
