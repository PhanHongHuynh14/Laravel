<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SkillMatrixController;
use App\Http\Controllers\Admin\GoogleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::name('admin.')->prefix('admin')->group(function () {
    Route::name('google.')->prefix('google')->group( function(){
        Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
        Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');

    });
    route::get('/', fn () =>redirect('admin/skill'));
    Route::resource('skill', SkillController::class);
    Route::resource('level', LevelController::class);
    Route::resource('skillMatrix', SkillMatrixController::class);
    Route::resource('user', UserController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
