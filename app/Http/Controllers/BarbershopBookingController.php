<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarbershopBookingController extends Controller
{
    public function index()
    {
        $bookings = BarbershopBooking::with(['barbershop', 'customer'])->get();
        return view('barbershop_bookings.index', compact('bookings'));
    }

    public function create()
    {
        $barbershops = Barbershop::where('is_open', true)->get();
        $customers = Customer::all();
        return view('barbershop_bookings.create', compact('barbershops', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barbershop_id' => 'required|exists:barbershops,id',
            'customer_id' => 'required|exists:customers,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        BarbershopBooking::create($request->all());
        return redirect()->route('barbershop_bookings.index')->with('success', 'Booking created successfully!');
    }

    public function show(BarbershopBooking $barbershopBooking)
    {
        return view('barbershop_bookings.show', compact('barbershopBooking'));
    }

    public function edit(BarbershopBooking $barbershopBooking)
    {
        $barbershops = Barbershop::where('is_open', true)->get();
        $customers = Customer::all();
        return view('barbershop_bookings.edit', compact('barbershopBooking', 'barbershops', 'customers'));
    }

    public function update(Request $request, BarbershopBooking $barbershopBooking)
    {
        $request->validate([
            'barbershop_id' => 'required|exists:barbershops,id',
            'customer_id' => 'required|exists:customers,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $barbershopBooking->update($request->all());
        return redirect()->route('barbershop_bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy(BarbershopBooking $barbershopBooking)
    {
        $barbershopBooking->delete();
        return redirect()->route('barbershop_bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
