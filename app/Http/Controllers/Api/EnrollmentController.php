<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\EnrollmentCreated;

class EnrollmentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id'  => 'required|exists:courses,id',
        ]);

        DB::beginTransaction();
        try {
            $exists = Enrollment::where('student_id', $data['student_id'])
                ->where('course_id', $data['course_id'])
                ->exists();

            if ($exists) {
                return response()->json(['message' => 'Already enrolled'], 422);
            }

            $enrollment = Enrollment::create([
                'student_id'  => $data['student_id'],
                'course_id'   => $data['course_id'],
                'enrolled_on' => now(),
                'status'      => 'active',
            ]);

            DB::commit();

            EnrollmentCreated::dispatch($enrollment);

            return response()->json($enrollment, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Enrollment failed'], 500);
        }
    }
}
