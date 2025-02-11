<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade'); // Links to users table (students)
            $table->foreignId('unit_id')->constrained()->onDelete('cascade'); // Links to units
            $table->foreignId('semester_id')->nullable()->constrained()->onDelete('cascade'); // Links to semester
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Enrollment status
            $table->decimal('grade', 5, 2)->nullable(); // Optional: Stores the grade
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
