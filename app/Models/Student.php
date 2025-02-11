<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'registration_number', 'faculty_id', 'email', 'phone_number'
    ];

    // A Student belongs to a User (a user can be a student)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A Student belongs to a Faculty
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    // A Student can have many Units (via enrollments)
    public function units()
    {
        return $this->belongsToMany(Unit::class, 'enrollments');
    }
}
