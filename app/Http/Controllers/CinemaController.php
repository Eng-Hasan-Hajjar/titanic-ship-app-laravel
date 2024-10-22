<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
     // عرض جميع السينمات
     public function index()
     {
         $cinemas = Cinema::all();
         return response()->json($cinemas, 200);
     }

     // عرض سينما معينة
     public function show($id)
     {
         $cinema = Cinema::findOrFail($id);
         return response()->json($cinema, 200);
     }

     // إنشاء سينما جديدة
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'seating_capacity' => 'required|integer',
             'screen_size' => 'required|string|max:255',
             'current_movie' => 'nullable|string|max:255',
             'is_open' => 'boolean',
         ]);

         $cinema = Cinema::create($validated);
         return response()->json($cinema, 201);
     }

     // تعديل سينما موجودة
     public function update(Request $request, $id)
     {
         $cinema = Cinema::findOrFail($id);

         $validated = $request->validate([
             'name' => 'sometimes|required|string|max:255',
             'seating_capacity' => 'sometimes|required|integer',
             'screen_size' => 'sometimes|required|string|max:255',
             'current_movie' => 'nullable|string|max:255',
             'is_open' => 'boolean',
         ]);

         $cinema->update($validated);
         return response()->json($cinema, 200);
     }

     // حذف سينما
     public function destroy($id)
     {
         $cinema = Cinema::findOrFail($id);
         $cinema->delete();
         return response()->json(['message' => 'Cinema deleted successfully'], 200);
     }
}
