<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventHallController extends Controller
{
    public function index()
    {
        $eventHalls = EventHall::all();
        return view('event_halls.index', compact('eventHalls'));
    }

    public function create()
    {
        return view('event_halls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hall_name' => 'required',
            'capacity' => 'required|integer',
            'price_per_hour' => 'required|numeric',
            'operating_hours' => 'required',
        ]);

        EventHall::create($request->all());
        return redirect()->route('event_halls.index')->with('success', 'Event hall added successfully!');
    }

    public function show(EventHall $eventHall)
    {
        return view('event_halls.show', compact('eventHall'));
    }

    public function edit(EventHall $eventHall)
    {
        return view('event_halls.edit', compact('eventHall'));
    }

    public function update(Request $request, EventHall $eventHall)
    {
        $request->validate([
            'hall_name' => 'required',
            'capacity' => 'required|integer',
            'price_per_hour' => 'required|numeric',
            'operating_hours' => 'required',
        ]);

        $eventHall->update($request->all());
        return redirect()->route('event_halls.index')->with('success', 'Event hall updated successfully!');
    }

    public function destroy(EventHall $eventHall)
    {
        $eventHall->delete();
        return redirect()->route('event_halls.index')->with('success', 'Event hall deleted successfully!');
    }
}
