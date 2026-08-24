<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['profile' => config('portfolio')]);
})->name('home');

Route::get('/education', function () {
    return view('education', [
        'profile' => config('portfolio'),
        'education' => config('portfolio.education'),
        'certifications' => config('portfolio.certifications'),
    ]);
})->name('education');
