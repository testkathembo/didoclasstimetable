<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'unit_id', 'semester_id', 'status', 'grade'];

    // Relationship: An enrollment belongs to a student (User with role student)
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Relationship: An enrollment belongs to a unit (course)
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Relationship: An enrollment belongs to a semester
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}

