<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', [ApiController::class, 'all_user']);
Route::get('users/{id}', [ApiController::class, 'show_user']);
Route::post('users', [ApiController::class, 'store_user']);
Route::put('users/{id}', [ApiController::class, 'update_user']);
Route::delete('users/{id}', [ApiController::class, 'delete_user']);

Route::get('short-url', [ApiController::class, 'all_short_url']);
Route::get('short-url/{id}', [ApiController::class, 'show_short_url']);
Route::post('short-url', [ApiController::class, 'store_short_url']);
Route::put('short-url/{id}', [ApiController::class, 'update_short_url']);
Route::delete('short-url/{id}', [ApiController::class, 'delete_short_url']);

