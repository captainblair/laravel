<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // allow all users for now
    }

    public function rules(): array
    {
        return [
            'course_code' => 'required|string|unique:courses,course_code',
            'course_name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:6',
        ];
    }
}
