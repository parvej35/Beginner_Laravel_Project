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

//User
Route::get('user_list', [ApiController::class, 'user_list']);
Route::get('get_user/{id}', [ApiController::class, 'get_user']);
Route::post('save_user', [ApiController::class, 'save_user']);
Route::put('update_user', [ApiController::class, 'update_user']);
Route::delete('delete_user/{id}', [ApiController::class, 'delete_user']);

//URLs
Route::get('url_list', [ApiController::class, 'url_list']);
Route::get('get_url/{id}', [ApiController::class, 'get_url']);
Route::post('save_url', [ApiController::class, 'save_url']);
Route::put('update_url', [ApiController::class, 'update_url']);
Route::delete('delete_url/{id}', [ApiController::class, 'delete_url']);
