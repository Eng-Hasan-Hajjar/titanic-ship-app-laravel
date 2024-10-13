<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventHallBookingController extends Controller
{
    public function index()
    {
        $bookings = EventHallBooking::with(['eventHall', 'customer'])->get();
        return view('event_hall_bookings.index', compact('bookings'));
    }

    public function create()
    {
        $eventHalls = EventHall::where('availability', 'available')->get();
        $customers = Customer::all();
        return view('event_hall_bookings.create', compact('eventHalls', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_hall_id' => 'required|exists:event_halls,id',
            'customer_id' => 'required|exists:customers,id',
            'event_type' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $eventHall = EventHall::find($request->event_hall_id);
        $duration = strtotime($request->end_time) - strtotime($request->start_time);
        $hours = $duration / 3600;
        $total_price = $eventHall->price_per_hour * $hours;

        EventHallBooking::create([
            'event_hall_id' => $request->event_hall_id,
            'customer_id' => $request->customer_id,
            'event_type' => $request->event_type,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $total_price,
            'status' => 'confirmed',
        ]);

        // تحديث حالة الصالة إلى "محجوزة"
        $eventHall->availability = 'booked';
        $eventHall->save();

        return redirect()->route('event_hall_bookings.index')->with('success', 'Booking created successfully!');
    }

    public function show(EventHallBooking $eventHallBooking)
    {
        return view('event_hall_bookings.show', compact('eventHallBooking'));
    }

    public function edit(EventHallBooking $eventHallBooking)
    {
        $eventHalls = EventHall::where('availability', 'available')->orWhere('id', $eventHallBooking->event_hall_id)->get();
        $customers = Customer::all();
        return view('event_hall_bookings.edit', compact('eventHallBooking', 'eventHalls', 'customers'));
    }

    public function update(Request $request, EventHallBooking $eventHallBooking)
    {
        $request->validate([
            'event_hall_id' => 'required|exists:event_halls,id',
            'customer_id' => 'required|exists:customers,id',
            'event_type' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $eventHall = EventHall::find($request->event_hall_id);
        $duration = strtotime($request->end_time) - strtotime($request->start_time);
        $hours = $duration / 3600;
        $total_price = $eventHall->price_per_hour * $hours;

        $eventHallBooking->update([
            'event_hall_id' => $request->event_hall_id,
            'customer_id' => $request->customer_id,
            'event_type' => $request->event_type,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $total_price,
            'status' => $request->status,
        ]);

        return redirect()->route('event_hall_bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy(EventHallBooking $eventHallBooking)
    {
        // تحديث حالة الصالة إلى "متاحة" إذا تم حذف الحجز
        $eventHall = $eventHallBooking->eventHall;
        $eventHall->availability = 'available';
        $eventHall->save();

        $eventHallBooking->delete();
        return redirect()->route('event_hall_bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
