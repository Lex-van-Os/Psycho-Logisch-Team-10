<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ClosedAnswerController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\OpenAnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReflectionsTrajectoryController;
use \App\Http\Controllers\QuestionController;

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

// Question routes
Route::get('question/get/{$id}', [QuestionController::class, 'retrieveQuestion']);

// Answer routes
Route::get('answer/get', [AnswerController::class, 'get'])->name('answer.get');
Route::post('answer/store', [AnswerController::class, 'store'])->name('answer.store');
Route::put('answer/update', [AnswerController::class, 'update'])->name('answer.update');

// Open answer routes
Route::get('openAnswer/get/{id}', [OpenAnswerController::class, 'get'])->name('openAnswer.get');
Route::delete('openAnswer/destroy/{id}', [OpenAnswerController::class, 'destroy'])->name('openAnswer.destroy');
Route::put('openAnswer/update/{id}', [OpenAnswerController::class, 'update'])->name('openAnswer.update');
Route::post('openAnswer/store', [OpenAnswerController::class, 'store'])->name('openAnswer.store');

// Closed answer rotues
Route::get('closedAnswer/get/{id}', [ClosedAnswerController::class, 'get'])->name('closedAnswer.get');
Route::delete('closedAnswer/destroy/{id}', [ClosedAnswerController::class, 'destroy'])->name('closedAnswer.destroy');
Route::put('closedAnswer/update/{id}', [ClosedAnswerController::class, 'update'])->name('closedAnswer.update');
Route::post('closedAnswer/store', [ClosedAnswerController::class, 'store'])->name('closedAnswer.store');

// Misc
Route::get('/getCsrfToken', [HelperController::class, 'getCsrfToken'])->name('getCsrfToken');

Route::get('/', [ReflectionsTrajectoryController::class, 'showAll']);
Route::post('/NewReflectionTrajectory', [ReflectionsTrajectoryController::class, 'store']);
Route::get('/retrieveReflectionTrajectory/{id}', [ReflectionsTrajectoryController::class, 'retrieveReflectionTrajectory']);
Route::get('/reflectionTrajectory/{id}/{type}',[]);
Route::get('/reflectionTrajectory/{id}',[ReflectionsTrajectoryController::class,'showTrajectory']);
Route::get('/retrieveAllReflectionTrajectories', [ReflectionsTrajectoryController::class, 'retrieveAll']);
