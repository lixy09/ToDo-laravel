<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('home');
Route::resource('tasks', TaskController::class);
Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
