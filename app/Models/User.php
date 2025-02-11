<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'faculty_id', 'email', 'phone_number', 'role', 'user_code', 'password'
    ];

    protected $hidden = ['password'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Auto-generate user_code
            $lastUser = User::latest()->first();
            $nextNumber = $lastUser ? intval(substr($lastUser->user_code, -4)) + 1 : 1001;
            $user->user_code = strtoupper($user->role) . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

            // Hash password
            $user->password = Hash::make($user->password);
        });
    }

    // Relationship with StudentProfile (if the user is a student)
    public function studentProfile()
    {
        return $this->hasOne(StudentProfile::class);
    }

    // Relationship with LecturerProfile (if the user is a lecturer)
    public function lecturerProfile()
    {
        return $this->hasOne(LecturerProfile::class);
    }

    // Relationship with AdminProfile (if the user is an admin)
    public function adminProfile()
    {
        return $this->hasOne(AdminProfile::class);
    }

    public function enrollments()
    {   
        return $this->hasMany(Enrollment::class, 'student_id');
    }

    public function enrolledUnits()
    {
        return $this->belongsToMany(Unit::class, 'enrollments');
    }
}
