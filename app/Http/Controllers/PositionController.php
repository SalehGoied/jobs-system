<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use App\Models\Competency;
use App\Services\ImageService;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::with('competencies')->get();
        return view('admin.positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image')){
            $data['image'] = (new ImageService())->store($request->image, 'page');
        }

        // Create Position
        $position = Position::create($data);
        // Add Competencies if any
        if (!empty($data['competencies'])) {
            foreach ($data['competencies'] as $competency) {
                $position->competencies()->create([
                    'competency' => $competency
                ]);
            }
        }

        return redirect()->route('admin.positions.index')->with('success', 'Position created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return view('admin.positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        return view('admin.positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Position $position)
    {
        $data = $request->validated();

        // Update image if uploaded
        if($request->hasFile('image')){
            $data['image'] = (new ImageService())->store($request->image, 'page');
        }

        // Update Position
        $position->update($data);

        // Update Competencies
        $position->competencies()->delete(); // Remove old competencies
        if (!empty($data['competencies'])) {
            foreach ($data['competencies'] as $competency) {
                Competency::create([
                    'position_id' => $position->id,
                    'competency' => $competency
                ]);
            }
        }

        return redirect()->route('admin.positions.index')->with('success', 'Position updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('admin.positions.index')->with('success', 'Position deleted successfully.');
    }
}
