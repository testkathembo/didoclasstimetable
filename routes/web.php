<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Welcome Page
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// 🔹 **Dashboard - Redirects based on role**
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 🔹 **Authenticated Routes**
Route::middleware(['auth'])->group(function () {
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // 🔹 **Admin Routes**
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])
            ->name('admin.index');
        Route::get('/admin/users', [AdminController::class, 'manageUsers'])
            ->name('admin.users');
    });

    // 🔹 **Lecturer Routes**
    Route::middleware(['role:lecturer'])->group(function () {
        Route::get('/lecturer', [LecturerController::class, 'index'])
            ->name('lecturer.index');
        Route::get('/lecturer/classes', [LecturerController::class, 'manageClasses'])
            ->name('lecturer.classes');
    });

    // 🔹 **Student Routes**
    Route::middleware(['role:student'])->group(function () {
        Route::get('/student', [StudentController::class, 'index'])
            ->name('student.index');
        Route::get('/student/schedule', [StudentController::class, 'schedule'])
            ->name('student.schedule');
    });

});

require __DIR__.'/auth.php';
