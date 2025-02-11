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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // User's first name
            $table->string('last_name'); // User's last name
            $table->foreignId('faculty_id')->nullable()->constrained()->onDelete('cascade'); // Nullable for admins
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->enum('role', ['student', 'lecturer', 'admin'])->default('student'); // Role system
            $table->string('user_code')->unique(); // Auto-generated in Model
            $table->string('password'); // Hashed password
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
