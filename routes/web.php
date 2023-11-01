<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReflectionsTrajectoryController;

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

Route::get('/', [ReflectionsTrajectoryController::class, 'showAll']);
Route::post('/NewReflectionTrajectory', [ReflectionsTrajectoryController::class, 'store']);
Route::get('/reflectionTrajectory/{$id}', [ReflectionsTrajectoryController::class, 'index']);
Route::get('/reflectionTrajectory/{$id}/{$type}',[]);
