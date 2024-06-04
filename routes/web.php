<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::resource('profile', ProfileController::class);
    Route::resource('tasks', TaskController::class);
    Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
});

require __DIR__.'/auth.php';
