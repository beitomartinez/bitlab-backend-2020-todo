<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::resource('tasks', 'TaskController');
Route::resource('categories', 'CategoryController');
