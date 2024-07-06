<?php

use App\Http\Controllers\Api\SearchTaskController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::apiResource('task', TaskController::class);
Route::get('tasks/search', [SearchTaskController::class, 'search'])->name('search-task');
