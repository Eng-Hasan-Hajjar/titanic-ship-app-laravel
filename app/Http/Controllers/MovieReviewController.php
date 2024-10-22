<?php

namespace App\Http\Controllers;

use App\Models\MovieReview;
use Illuminate\Http\Request;

class MovieReviewController extends Controller
{
     // عرض جميع المراجعات
     public function index()
     {
         $reviews = MovieReview::with(['movie', 'passenger'])->get();
         return response()->json($reviews, 200);
     }

     // عرض مراجعة معينة
     public function show($id)
     {
         $review = MovieReview::with(['movie', 'passenger'])->findOrFail($id);
         return response()->json($review, 200);
     }

     // إضافة مراجعة جديدة
     public function store(Request $request)
     {
         $validated = $request->validate([
             'movie_id' => 'required|exists:movies,id',
             'passenger_id' => 'required|exists:passengers,id',
             'rating' => 'required|integer|min:1|max:5',  // تقييم بين 1 و 5
             'review' => 'nullable|string',
         ]);

         $review = MovieReview::create($validated);
         return response()->json($review, 201);
     }

     // تعديل مراجعة موجودة
     public function update(Request $request, $id)
     {
         $review = MovieReview::findOrFail($id);

         $validated = $request->validate([
             'rating' => 'sometimes|required|integer|min:1|max:5',
             'review' => 'nullable|string',
         ]);

         $review->update($validated);
         return response()->json($review, 200);
     }

     // حذف مراجعة
     public function destroy($id)
     {
         $review = MovieReview::findOrFail($id);
         $review->delete();
         return response()->json(['message' => 'Movie Review deleted successfully'], 200);
     }
}
