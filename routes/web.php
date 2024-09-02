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
Route::get('/admin/division', function () {
    return view('admin.division.index');
});

Route::resource('admin/user', UserController::class);
Route::get('user/all', [UserController::class, 'getAll']);
Route::resource('admin/division', UserController::class);
Route::get('user/all', [UserController::class, 'getAll']);
