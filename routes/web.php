<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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
    if (UserController::isLoggedIn()) {
        return redirect()->route('home');
    } else {
        return view('login');
    }
})->name('login');
Route::post('/', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'getPresetKeywords'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/home', [PostController::class, 'getHomePostData'])->name('home');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile', function(){
    return view('profile');
})->name('profile');

Route::get('/panel', function(){
    return view('panel');
})->name('panel');





