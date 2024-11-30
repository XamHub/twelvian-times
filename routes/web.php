<?php

use Illuminate\Support\Facades\Route;
use App\Models\Newsletter;

Route::get('/', function () {
    $newsletters = Newsletter::orderBy('published_at', 'DESC')->get();

    return view('welcome', compact('newsletters'));
});

Route::get('/newsletters', function () {
    $newsletters = Newsletter::orderBy('published_at', 'DESC')->get();

    return view('newsletters.index', compact('newsletters'));
});

Route::get('/newsletters/{slug}', function ($slug) {
    $newsletter = Newsletter::where('slug', $slug)->firstOrFail();

    return view('newsletter', compact('newsletter'));
});
