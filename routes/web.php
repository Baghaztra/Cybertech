<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/test', function () {
    echo "<a href='#'>test</a>";
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::resource('admin/user', UserController::class);