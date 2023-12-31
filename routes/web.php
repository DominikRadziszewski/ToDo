<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

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

Auth::routes();

Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('task.index');
Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
Route::delete('/task/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('task.delete');
Route::put('/task/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('task.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
