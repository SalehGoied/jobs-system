<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // Display a list of job applications
    public function index()
    {
        // Retrieve all applications along with their related user and position information
        $applications = Application::with(['user', 'position'])->get();

        return view('admin.applications.index', compact('applications'));
    }

    // Delete a specific application
    public function destroy(Application $application)
    {
        // Delete the application
        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully.');
    }
}
