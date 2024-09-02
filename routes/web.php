<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home.index');
});
Route::get('/test', function () {
    echo "<a href='#'>test</a>";
});