<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SportsFieldController extends Controller
{
    public function index()
    {
        $fields = SportsField::all();
        return view('sports_fields.index', compact('fields'));
    }

    public function create()
    {
        return view('sports_fields.create');
    }

    public function store(Request $request)
    {
        SportsField::create($request->all());
        return redirect()->route('sports_fields.index')->with('success', 'Sports field added successfully!');
    }

    public function show($id)
    {
        $field = SportsField::findOrFail($id);
        return view('sports_fields.show', compact('field'));
    }

    public function update(Request $request, $id)
    {
        $field = SportsField::findOrFail($id);
        $field->update($request->all());
        return redirect()->route('sports_fields.index')->with('success', 'Sports field updated successfully!');
    }

    public function destroy($id)
    {
        $field = SportsField::findOrFail($id);
        $field->delete();
        return redirect()->route('sports_fields.index')->with('success', 'Sports field deleted successfully!');
    }
}
