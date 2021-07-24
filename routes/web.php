<?php

use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

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
Route::resource('threads', ThreadController::class);
Route::resource('replies', ReplyController::class);
Route::get('/', function () {
    return redirect()->route('threads.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();




