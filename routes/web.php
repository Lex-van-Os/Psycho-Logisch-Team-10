<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
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

// Question routes

// Answer routes
Route::get('answer/get', [AnswerController::class, 'get'])->name('answer.get');
Route::post('answer/store', [AnswerController::class, 'store'])->name('answer.store');
Route::put('answer/update', [AnswerController::class, 'update'])->name('answer.update');

Route::get('/getCsrfToken', [HelperController::class, 'getCsrfToken'])->name('getCsrfToken');