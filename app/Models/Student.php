<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name','last_name','email','date_of_birth'
    ];

    // accessor
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    // many-to-many via enrollments pivot
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
                    ->withPivot('enrolled_on','status')
                    ->withTimestamps();
    }
}
