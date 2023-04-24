<?php

use App\Http\Controllers\CacheController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('db')->group(function() {
    Route::get('select', [\App\Http\Controllers\DBController::class, 'select']);
    Route::get('detail/{id}', [\App\Http\Controllers\DBController::class, 'detail']);
    Route::get('add', [\App\Http\Controllers\DBController::class, 'add']);
    Route::post('insert', [\App\Http\Controllers\DBController::class, 'insert']);
    Route::get('delete/{id}', [\App\Http\Controllers\DBController::class, 'delete']);
    Route::get('edit/{id}', [\App\Http\Controllers\DBController::class, 'edit']);
    Route::post('edit/{id}', [\App\Http\Controllers\DBController::class, 'update']);
});

Route::get('cache', [CacheController::class, 'test']);

Route::get('mail', [MailController::class, 'send']);
