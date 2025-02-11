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
    Schema::create('lecturer_profiles', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Connect to users table
        $table->string('staff_id')->unique(); // Auto-generated in Model
        $table->string('department')->nullable();
        $table->string('office_location')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('lecturer_profiles');
}

};
