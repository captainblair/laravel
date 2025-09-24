<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    // other resource methods omitted for brevity

    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $course = Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Course created.');
    }
}
