<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ShortenedUrlsController;
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

//Route::get('/', function () {return view('welcome');})->middleware('auth');
//Route::get('home', function () {return view('welcome');})->middleware('auth');
//Route::get('dashboard', function () {return view('welcome');})->middleware('auth');

Route::get('/', [ShortenedUrlsController::class, 'home']);
//Route::get('/', function () {return view('welcome');});
//Route::get('home', function () {return view('welcome');});
//Route::get('dashboard', function () {return view('welcome');});

Route::resource('shortenedurl', ShortenedUrlsController::class);
Route::get('export_url_list', [ShortenedUrlsController::class, 'export_url_list']);

Route::get('url-list', [ShortenedUrlsController::class, 'index'])->name('url-list');
Route::get('user-list', [UsersController::class, 'list'])->name('user-list');

Route::get('login', [UsersController::class, 'index'])->name('login');
Route::post('post-login', [UsersController::class, 'postLogin'])->name('login.post');
Route::get('registration', [UsersController::class, 'registration'])->name('register');
Route::post('post-registration', [UsersController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [UsersController::class, 'logout'])->name('logout');

//generate-pdf
//Route::get('export_url_list', [PDFController::class, 'export_url_list']);



