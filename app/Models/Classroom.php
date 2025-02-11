<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number', 'capacity', 'location'
    ];

    // Classroom has many Units (e.g., specific courses are taught in specific classrooms)
    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    // Classroom is associated with many Lecturers
    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class, 'classroom_lecturer');
    }
}
