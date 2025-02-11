<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('admin_profiles', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Connect to users table
        $table->string('admin_code')->unique(); // Auto-generated
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('admin_profiles');
}

};
