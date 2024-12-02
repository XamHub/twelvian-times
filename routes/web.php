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

Route::get('/newsletters/{newsletter}', function (Newsletter $newsletter) {
    return view('newsletters.show', compact('newsletter'));
})->name('newsletters.show');
