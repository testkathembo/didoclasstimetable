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
    Schema::create('student_profiles', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Connect to users table
        $table->string('registration_number')->unique(); // Auto-generated in Model
        $table->date('date_of_birth')->nullable();
        $table->text('address')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('student_profiles');
}    
};
