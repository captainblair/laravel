<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\EnrollmentController;

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

// Authenticated user (Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ----------------- STUDENTS ROUTES -----------------
Route::get('/students', [StudentController::class, 'index']);          // GET all students (paginated)
Route::get('/students/{id}', [StudentController::class, 'show']);      // GET single student with courses
Route::post('/students', [StudentController::class, 'store']);         // Create student
Route::put('/students/{id}', [StudentController::class, 'update']);    // Update student
Route::delete('/students/{id}', [StudentController::class, 'destroy']); // Delete student

// ----------------- ENROLLMENT ROUTES -----------------
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/enrollments', [EnrollmentController::class, 'store']);   // Enroll a student into a course
    Route::get('/my-courses', [EnrollmentController::class, 'myCourses']); // Authenticated student's courses
});
