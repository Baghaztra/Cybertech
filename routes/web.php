<?php


use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DivisionController;
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

Route::middleware('auth')->group(function(){
    Route::resource('admin/user', UserController::class);
    Route::get('user/all',[UserController::class, 'getAll']);
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::post('admin/logout', [AuthenticationController::class, 'logout'])->name('logout');
});
Route::resource('admin/user', UserController::class);
Route::get('user/all', [UserController::class, 'getAll']);
Route::resource('admin/division', DivisionController::class);
Route::get('division/all', [DivisionController::class, 'getAll']);
