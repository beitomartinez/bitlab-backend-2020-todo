<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('tasks/create', 'tasks.create');
Route::post('tasks/store', 'TaskController@store')->name('tasks.store');
Route::view('tasks/stored', 'tasks.stored');