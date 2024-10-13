<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GymBookingController extends Controller
{
    public function index()
    {
        $bookings = GymBooking::with(['gym', 'customer'])->get();
        return view('gym_bookings.index', compact('bookings'));
    }

    public function create()
    {
        $gyms = Gym::where('is_open', true)->get();
        $customers = Customer::all();
        return view('gym_bookings.create', compact('gyms', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gym_id' => 'required|exists:gyms,id',
            'customer_id' => 'required|exists:customers,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        GymBooking::create($request->all());
        return redirect()->route('gym_bookings.index')->with('success', 'Booking created successfully!');
    }

    public function show(GymBooking $gymBooking)
    {
        return view('gym_bookings.show', compact('gymBooking'));
    }

    public function edit(GymBooking $gymBooking)
    {
        $gyms = Gym::where('is_open', true)->get();
        $customers = Customer::all();
        return view('gym_bookings.edit', compact('gymBooking', 'gyms', 'customers'));
    }

    public function update(Request $request, GymBooking $gymBooking)
    {
        $request->validate([
            'gym_id' => 'required|exists:gyms,id',
            'customer_id' => 'required|exists:customers,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $gymBooking->update($request->all());
        return redirect()->route('gym_bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy(GymBooking $gymBooking)
    {
        $gymBooking->delete();
        return redirect()->route('gym_bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
