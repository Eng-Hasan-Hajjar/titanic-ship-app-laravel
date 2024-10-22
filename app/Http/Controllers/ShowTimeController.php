<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    // عرض جميع أوقات العرض لسينما معينة
    public function index($cinemaId)
    {
        $cinema = Cinema::findOrFail($cinemaId);
        $showTimes = $cinema->showTimes; // استخدام العلاقة بين السينما وأوقات العرض
        return response()->json($showTimes, 200);
    }

    // عرض وقت عرض معين
    public function show($id)
    {
        $showTime = ShowTime::findOrFail($id);
        return response()->json($showTime, 200);
    }

    // إضافة وقت عرض جديد لسينما معينة
    public function store(Request $request, $cinemaId)
    {
        $cinema = Cinema::findOrFail($cinemaId);

        $validated = $request->validate([
            'show_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $showTime = new ShowTime($validated);
        $cinema->showTimes()->save($showTime);

        return response()->json($showTime, 201);
    }

    // تعديل وقت عرض معين
    public function update(Request $request, $id)
    {
        $showTime = ShowTime::findOrFail($id);

        $validated = $request->validate([
            'show_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $showTime->update($validated);
        return response()->json($showTime, 200);
    }

    // حذف وقت عرض معين
    public function destroy($id)
    {
        $showTime = ShowTime::findOrFail($id);
        $showTime->delete();
        return response()->json(['message' => 'Showtime deleted successfully'], 200);
    }
}
