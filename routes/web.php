<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('login');
})->name('login');
Route::post('/', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'getPresetKeywords'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/home', function () {
    return view('home');
})->name('home');
