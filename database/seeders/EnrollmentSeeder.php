<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;
use App\Models\User;
use App\Models\Unit;
use App\Models\Semester;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        // Get a student, a unit, and a semester
        $student = User::where('role', 'student')->first();
        $unit = Unit::first();
        $semester = Semester::first();

        // Create an enrollment
        Enrollment::create([
            'student_id' => $student->id,
            'unit_id' => $unit->id,
            'semester_id' => $semester->id,
            'status' => 'approved',
            'grade' => null, // Grade can be updated later
        ]);
    }
}

