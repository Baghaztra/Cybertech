<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home.index');
});
Route::get('/test', function () {
    echo "<a href='#'>test</a>";
});

Route::middleware('guest')->group(function(){
    Route::get('admin/login', [AuthenticationController::class, 'loginForm'])->name('login');
    Route::post('admin/login', [AuthenticationController::class, 'loginProses']);
});
Route::get('/admin/division', function () {
    return view('admin.division.index');
});



Route::get('form/{formId}', [ResponseController::class, 'create'])
->name('responses.create');

Route::middleware('auth')->group(function(){
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('admin/post', PostController::class);
    Route::resource('admin/event', EventController::class);
    Route::resource('admin/user', UserController::class);
    Route::resource('admin/division', DivisionController::class);
    Route::resource('admin/form',FormController::class);
    
    Route::get('post/all',[PostController::class, 'getAll']);
    Route::get('event/all',[EventController::class, 'getAll']);
    Route::get('user/all',[UserController::class, 'getAll']);
    Route::get('division/all', [DivisionController::class, 'getAll']);
    Route::get('forms/all', [FormController::class, 'all']);

    Route::post('admin/logout', [AuthenticationController::class, 'logout'])->name('logout');
});
