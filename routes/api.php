<?php

use App\Http\Controllers\Api\SearchTaskController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('task/search', [SearchTaskController::class, 'search'])->name('search-task');
Route::apiResource('task', TaskController::class);
