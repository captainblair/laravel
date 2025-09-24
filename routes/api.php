<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned the "api"
| middleware group. Enjoy building your API!
|
*/

// Example test route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Students API Routes
Route::get('/students', [StudentController::class, 'index']);   // GET /api/students - paginated list
Route::get('/students/{id}', [StudentController::class, 'show']); // GET /api/students/{id} - single student
Route::post('/students', [StudentController::class, 'store']);   // POST /api/students - create new student
Route::put('/students/{id}', [StudentController::class, 'update']); // PUT /api/students/{id} - update student
Route::delete('/students/{id}', [StudentController::class, 'destroy']); // DELETE /api/students/{id} - delete student
