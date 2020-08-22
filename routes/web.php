<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::resource('tasks', 'TaskController');
Route::resource('categories', 'CategoryController');

Route::get(
    'categories/{id}/tareas-completadas',
    [CategoryController::class, 'showCompletedTasks']
)->name('categories.show-completed');