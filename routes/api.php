<?php

use App\Http\Controllers\Api\{CategoryController, TaskController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(
    function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::prefix('{category}')->group(
            function () {
                Route::get('', [CategoryController::class, 'show']);
                Route::put('', [CategoryController::class, 'update']);
            }
        );
    }
);

Route::prefix('tasks')->group(
    function () {
        Route::get('', [TaskController::class, 'index']);
        Route::prefix('{task}')->group(
            function () {
                Route::get('', [TaskController::class, 'show']);
                Route::get('with-category', [TaskController::class, 'showWithCategory']);
                Route::put('', [TaskController::class, 'update']);
            }
        );
    }
);