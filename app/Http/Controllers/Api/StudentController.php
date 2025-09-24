<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Return paginated students as JSON using StudentResource.
     */
    public function index()
    {
        // Fetch students with their related courses and paginate 10 per page
        $students = Student::with('courses')->paginate(10);

        // Wrap with resource collection
        return StudentResource::collection($students);
    }

    /**
     * Show a single student.
     */
    public function show($id)
    {
        $student = Student::with('courses')->findOrFail($id);
        return new StudentResource($student);
    }

    /**
     * Store a new student (optional).
     */
    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return new StudentResource($student);
    }

    /**
     * Update an existing student (optional).
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return new StudentResource($student);
    }

    /**
     * Delete a student (optional).
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }
}
