<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

// Default home route
Route::get('/', function () {
    return "Hello, Laravel at TU Kenya!";
});

// Students route (web)
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
