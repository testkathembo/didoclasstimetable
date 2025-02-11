<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function manageUsers()
    {
        $users = User::all();
        return Inertia::render('Admin/Users', ['users' => $users]);
    }
}

