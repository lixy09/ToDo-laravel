<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Route::middleware('auth')->group(function () {
//    Route::resource('profile', ProfileController::class);
//    Route::resource('tasks', TaskController::class);
//    Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
//});

Route::resource('profile', ProfileController::class);
Route::resource('tasks', TaskController::class);
Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

Route::get('/test-email', function () {
    \Illuminate\Support\Facades\Mail::raw('This is a test email', function ($message) {
        $message->to('your_email@example.com')
            ->subject('Test Email');
    });

    return 'Test email sent!';
});


require __DIR__.'/auth.php';
