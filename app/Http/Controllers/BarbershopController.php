<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarbershopController extends Controller
{
    public function index()
    {
        $barbershops = Barbershop::all();
        return view('barbershops.index', compact('barbershops'));
    }

    public function create()
    {
        return view('barbershops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'opening_hours' => 'required',
        ]);

        Barbershop::create($request->all());
        return redirect()->route('barbershops.index')->with('success', 'Barbershop added successfully!');
    }

    public function show(Barbershop $barbershop)
    {
        return view('barbershops.show', compact('barbershop'));
    }

    public function edit(Barbershop $barbershop)
    {
        return view('barbershops.edit', compact('barbershop'));
    }

    public function update(Request $request, Barbershop $barbershop)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'opening_hours' => 'required',
        ]);

        $barbershop->update($request->all());
        return redirect()->route('barbershops.index')->with('success', 'Barbershop updated successfully!');
    }

    public function destroy(Barbershop $barbershop)
    {
        $barbershop->delete();
        return redirect()->route('barbershops.index')->with('success', 'Barbershop deleted successfully!');
    }
}
