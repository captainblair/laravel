<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name, // accessor from Student model
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'courses' => $this->courses->map(function ($course) {
                return [
                    'course_code' => $course->course_code,
                    'course_name' => $course->course_name,
                    'credits' => $course->credits,
                ];
            }),
        ];
    }
}
