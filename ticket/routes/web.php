<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\UserController;
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

/* USER */

Route::post('user/login', [UserController::class, 'login']);
Route::post('user/register', [UserController::class, 'register']);
Route::get('user/detail', [UserController::class, 'detail']);

/* TICKET */

Route::post('ticket/add', [BusController::class, 'add']);
Route::post('ticket/edit', [BusController::class, 'edit']);
Route::post('ticket/delete', [BusController::class, 'delete']);

Route::get('ticket/all', [BusController::class, 'all']);
Route::post('ticket/reserve', [BusController::class, 'reserve']);
Route::get('ticket/detail', [BusController::class, 'detail']);
