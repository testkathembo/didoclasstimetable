<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_name', 'unit_code', 'semester_id'
    ];

    // A Unit belongs to a Semester
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    // A Unit is taught by many Lecturers
    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class);
    }

    // A Unit can be enrolled by many Students
    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }

    // A Unit can have many Classrooms
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'unit_classroom');
    }

    // A Unit can have many Timeslots
    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class, 'unit_timeslot');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function enrolledStudents()
    {   
        return $this->belongsToMany(User::class, 'enrollments', 'unit_id', 'student_id');
    }

}

