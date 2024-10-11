<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Position;
use App\Models\Application;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch counts of users, positions, and applications
        $userCount = User::count();
        $positionCount = Position::count();
        $applicationCount = Application::count();

        // Pass counts to the view
        return view('admin.index', compact('userCount', 'positionCount', 'applicationCount'));
    }
}
