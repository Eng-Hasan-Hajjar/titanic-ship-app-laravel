<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        $gyms = Gym::all();
        return view('gyms.index', compact('gyms'));
    }

    public function create()
    {
        return view('gyms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'opening_hours' => 'required',
        ]);

        Gym::create($request->all());
        return redirect()->route('gyms.index')->with('success', 'Gym added successfully!');
    }

    public function show(Gym $gym)
    {
        return view('gyms.show', compact('gym'));
    }

    public function edit(Gym $gym)
    {
        return view('gyms.edit', compact('gym'));
    }

    public function update(Request $request, Gym $gym)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'opening_hours' => 'required',
        ]);

        $gym->update($request->all());
        return redirect()->route('gyms.index')->with('success', 'Gym updated successfully!');
    }

    public function destroy(Gym $gym)
    {
        $gym->delete();
        return redirect()->route('gyms.index')->with('success', 'Gym deleted successfully!');
    }
}
