<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use App\Models\Highlight;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendHomeController::class, 'index'])->name('home');
Route::get('/event', [FrontendHomeController::class, 'events'])->name('event');
Route::get('/event/{id}', [FrontendHomeController::class, 'event'])->name('detail-event');
Route::get('/galeri', [FrontendHomeController::class, 'galeri'])->name('galeri');
Route::get('/about', [FrontendHomeController::class, 'about'])->name('about');

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

    // crud
    Route::resource('admin/post', PostController::class);
    Route::resource('admin/event', EventController::class);
    Route::resource('admin/user', UserController::class);
    Route::resource('admin/division', DivisionController::class);
    Route::resource('admin/form', FormController::class);
    Route::resource('admin/highlight', HighlightController::class);
    
    // Mengambil data json
    Route::get('post/all', [PostController::class, 'getAll']);
    Route::get('event/all', [EventController::class, 'getAll']);
    Route::get('user/all', [UserController::class, 'getAll']);
    Route::get('division/all', [DivisionController::class, 'getAll']);
    Route::get('forms/all', [FormController::class, 'all']);
    Route::get('highlight/all', [HighlightController::class, 'getAll']);
    
    // Temporary image
    Route::post('/admin/uploadMedia/{type}', [AssetController::class, 'uploadMedia']);
    Route::delete('/admin/deleteMedia/{type}', [AssetController::class, 'destroyMedia']);
    Route::delete('/admin/emptyTemporary', [AssetController::class, 'emptyTemporary']);
    
    // logout
    Route::post('admin/logout', [AuthenticationController::class, 'logout'])->name('logout');
});
