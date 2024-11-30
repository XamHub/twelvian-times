<?php

use Illuminate\Support\Facades\Route;
use App\Models\Newsletter;

Route::get('/', function () {
    $newsletters = Newsletter::orderBy('published_at', 'DESC')->get();

    return view('welcome', compact('newsletters'));
});
