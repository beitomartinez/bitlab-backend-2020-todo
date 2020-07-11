<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('tasks/status', 'TaskStatusController');

Route::resource('tasks', 'TaskController');
Route::resource('categories', 'CategoryController');

Route::redirect('types', 'categories');

Route::prefix('blade-test')->group(
    function () {
        Route::view('if', 'blade-test.if.form');
        Route::post('if/form', 'BladeTestController@ifPost');
        
        Route::view('for', 'blade-test.for.form');
        Route::post('for/form', 'BladeTestController@forPost');
        
        Route::view('foreach', 'blade-test.foreach.form');
        Route::post('foreach/form', 'BladeTestController@foreachPost');
        
        Route::view('forelse', 'blade-test.forelse.form');
        Route::post('forelse/form', 'BladeTestController@forelsePost');
    }
);