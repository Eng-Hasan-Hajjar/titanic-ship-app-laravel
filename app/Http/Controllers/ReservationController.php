<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $rooms = Room::where('is_occupied', false)->get();
        $customers = Customer::all();
        return view('reservations.create', compact('rooms', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_price' => 'required|numeric',
            'status' => 'required'
        ]);

        $room = Room::find($request->room_id);
        $room->is_occupied = true;
        $room->save();

        Reservation::create($request->all());
        return redirect()->route('reservations.index');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $rooms = Room::where('is_occupied', false)->get();
        $customers = Customer::all();
        return view('reservations.edit', compact('reservation', 'rooms', 'customers'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_price' => 'required|numeric',
            'status' => 'required'
        ]);

        $room = Room::find($reservation->room_id);
        if ($room) {
            $room->is_occupied = false;
            $room->save();
        }

        $room = Room::find($request->room_id);
        $room->is_occupied = true;
        $room->save();

        $reservation->update($request->all());
        return redirect()->route('reservations.index');
    }

    public function destroy(Reservation $reservation)
    {
        $room = Room::find($reservation->room_id);
        if ($room) {
            $room->is_occupied = false;
            $room->save();
        }

        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
