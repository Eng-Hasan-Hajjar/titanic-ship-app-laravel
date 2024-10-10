<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:restaurants',
            'capacity' => 'required|integer',
            'cuisine_type' => 'required',
            'opening_hours' => 'required',
        ]);

        Restaurant::create($request->all());
        return redirect()->route('restaurants.index');
    }

    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required|unique:restaurants,name,' . $restaurant->id,
            'capacity' => 'required|integer',
            'cuisine_type' => 'required',
            'opening_hours' => 'required',
        ]);

        $restaurant->update($request->all());
        return redirect()->route('restaurants.index');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurants.index');
    }
}
