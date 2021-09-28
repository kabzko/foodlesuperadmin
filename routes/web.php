<?php

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

Auth::routes();

Route::get('{path}', [App\Http\Controllers\HomeController::class, 'index'])->where('path', '|login|rider_list|store_list|store_detail|fare|rider_detail|chat_support|ticket_detail|active_orders_list');

Route::post('/refreshToken', [App\Http\Controllers\HomeController::class, 'refreshToken']);
Route::get('/hashpassword', [App\Http\Controllers\ApiController::class, 'hashpassword']);
Route::post('/load_riders', [App\Http\Controllers\ApiController::class, 'load_riders']);
Route::post('/load_stores', [App\Http\Controllers\ApiController::class, 'load_stores']);
Route::post('/save_new_rider', [App\Http\Controllers\ApiController::class, 'save_new_rider']);
Route::post('/save_new_store', [App\Http\Controllers\ApiController::class, 'save_new_store']);
Route::post('/all_fares', [App\Http\Controllers\ApiController::class, 'all_fares']);
Route::post('/load_store_detail', [App\Http\Controllers\ApiController::class, 'load_store_detail']);
Route::post('/update_store_detail', [App\Http\Controllers\ApiController::class, 'update_store_detail']);
Route::post('/load_rider_detail', [App\Http\Controllers\ApiController::class, 'load_rider_detail']);
Route::post('/update_rider_detail', [App\Http\Controllers\ApiController::class, 'update_rider_detail']);
Route::post('/update_fares', [App\Http\Controllers\ApiController::class, 'update_fares']);
Route::post('/load_tickets', [App\Http\Controllers\ApiController::class, 'load_tickets']);
Route::post('/load_chatbox', [App\Http\Controllers\ApiController::class, 'load_chatbox']);
Route::post('/send_message', [App\Http\Controllers\ApiController::class, 'send_message']);
Route::post('/close_ticket', [App\Http\Controllers\ApiController::class, 'close_ticket']);
Route::post('/load_active_orders', [App\Http\Controllers\ApiController::class, 'load_active_orders']);
Route::post('/reset_rider_password', [App\Http\Controllers\ApiController::class, 'reset_rider_password']);
Route::post('/reset_store_password', [App\Http\Controllers\ApiController::class, 'reset_store_password']);
