<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester_name', 'start_date', 'end_date'
    ];

    // A Semester has many Units (courses)
    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

}

