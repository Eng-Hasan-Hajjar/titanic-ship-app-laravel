<?php

namespace App\Http\Controllers;

use App\Models\SeatReservation;
use Illuminate\Http\Request;

class SeatReservationController extends Controller
{
   // عرض جميع الحجوزات
   public function index()
   {
       $reservations = SeatReservation::with(['movie', 'passenger'])->get();
       return response()->json($reservations, 200);
   }

   // عرض حجز معين
   public function show($id)
   {
       $reservation = SeatReservation::with(['movie', 'passenger'])->findOrFail($id);
       return response()->json($reservation, 200);
   }

   // إضافة حجز جديد
   public function store(Request $request)
   {
       $validated = $request->validate([
           'movie_id' => 'required|exists:movies,id',
           'passenger_id' => 'required|exists:passengers,id',
           'seat_number' => 'required|string|max:10',
           'reservation_time' => 'required|date_format:Y-m-d H:i:s',
       ]);

       $reservation = SeatReservation::create($validated);
       return response()->json($reservation, 201);
   }

   // تعديل حجز موجود
   public function update(Request $request, $id)
   {
       $reservation = SeatReservation::findOrFail($id);

       $validated = $request->validate([
           'seat_number' => 'sometimes|required|string|max:10',
           'reservation_time' => 'sometimes|required|date_format:Y-m-d H:i:s',
       ]);

       $reservation->update($validated);
       return response()->json($reservation, 200);
   }

   // حذف حجز
   public function destroy($id)
   {
       $reservation = SeatReservation::findOrFail($id);
       $reservation->delete();
       return response()->json(['message' => 'Seat Reservation deleted successfully'], 200);
   }
}
