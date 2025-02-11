<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'faculty_id'
    ];

    // Lecturer belongs to a Faculty
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    // Lecturer teaches many Units (subjects)
    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    // Lecturer can teach in many Classrooms (many-to-many)
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_lecturer');
    }
}

