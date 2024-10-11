<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function positions() {
        $positions = Position::all();

        return view('jobs', compact('positions'));
    }

    public function position(Position $position) {

        return view('job', compact('position'));
    }

    public function storeApplication(Request $request)
    {
        // Validate the form input
        $request->validate([
            'position_id' => 'required|exists:positions,id',
            'confirm_data' => 'accepted', // The user must confirm the data
        ]);

        // Store the application
        Application::create([
            'position_id' => $request->position_id,
            'user_id' => Auth::id(), // Assuming the user is logged in
            'status' => 'pending', // Default status for the application
        ]);

        // Redirect to a confirmation page or back with success message
        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}
