<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
      // عرض جميع الأفلام
      public function index()
      {
          $movies = Movie::all();
          return response()->json($movies, 200);
      }

      // عرض فيلم معين
      public function show($id)
      {
          $movie = Movie::findOrFail($id);
          return response()->json($movie, 200);
      }

      // إضافة فيلم جديد
      public function store(Request $request)
      {
          $validated = $request->validate([
              'title' => 'required|string|max:255',
              'duration' => 'required|integer|min:1',  // مدة الفيلم بالدقائق
              'genre' => 'required|string|max:255',
              'release_date' => 'required|date',
              'director' => 'nullable|string|max:255',
              'description' => 'nullable|string',
          ]);

          $movie = Movie::create($validated);
          return response()->json($movie, 201);
      }

      // تعديل فيلم موجود
      public function update(Request $request, $id)
      {
          $movie = Movie::findOrFail($id);

          $validated = $request->validate([
              'title' => 'sometimes|required|string|max:255',
              'duration' => 'sometimes|required|integer|min:1',
              'genre' => 'sometimes|required|string|max:255',
              'release_date' => 'sometimes|required|date',
              'director' => 'nullable|string|max:255',
              'description' => 'nullable|string',
          ]);

          $movie->update($validated);
          return response()->json($movie, 200);
      }

      // حذف فيلم
      public function destroy($id)
      {
          $movie = Movie::findOrFail($id);
          $movie->delete();
          return response()->json(['message' => 'Movie deleted successfully'], 200);
      }
}
