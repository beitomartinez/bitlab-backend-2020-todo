<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('tasks/status', 'TaskStatusController');

Route::resource('tasks', 'TaskController');
Route::resource('categories', 'CategoryController');
