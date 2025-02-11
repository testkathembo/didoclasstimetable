<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return Inertia::render('Admin/Dashboard');
        } elseif ($user->role === 'lecturer') {
            return Inertia::render('Lecturer/Dashboard');
        } else {
            return Inertia::render('Student/Dashboard');
        }
    }
}
