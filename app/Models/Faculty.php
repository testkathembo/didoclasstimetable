<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['faculty_name', 'faculty_dean', 'faculty_location'];

    // A Faculty has many Students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // A Faculty has many Lecturers
    public function lecturers()
    {
        return $this->hasMany(Lecturer::class);
    }
}


