<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('home', 'home')->name('home');

Route::middleware('auth')->group(
    function () {
        Route::resource('tasks', 'TaskController');
        Route::resource('categories', 'CategoryController');
    }
);

Route::get(
    'categories/{id}/tareas-completadas',
    [CategoryController::class, 'showCompletedTasks']
)->name('categories.show-completed');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home'); // PODEMOS OBVIARLO