<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'tasks',
    'as' => 'tasks',
], function ($route) {
    $route->get('', [TaskController::class, 'index'])->name('.index');
    $route->post('', [TaskController::class, 'store'])->name('.store');
    $route->put('{task}/complete', [TaskController::class, 'markAsCompleted'])->name('.complete');
    $route->delete('{task}', [TaskController::class, 'destroy'])->name('.destroy');
});