<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::resource('tasks', 'TaskController');
Route::resource('categories', 'CategoryController');
