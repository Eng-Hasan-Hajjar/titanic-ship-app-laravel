<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationOperationController extends Controller
{
    public function index()
    {
        $operations = NavigationOperation::all();
        return view('navigation_operations.index', compact('operations'));
    }

    public function create()
    {
        return view('navigation_operations.create');
    }

    public function store(Request $request)
    {
        NavigationOperation::create($request->all());
        return redirect()->route('navigation_operations.index')->with('success', 'Navigation operation recorded successfully!');
    }

    public function show($id)
    {
        $operation = NavigationOperation::findOrFail($id);
        return view('navigation_operations.show', compact('operation'));
    }

    public function update(Request $request, $id)
    {
        $operation = NavigationOperation::findOrFail($id);
        $operation->update($request->all());
        return redirect()->route('navigation_operations.index')->with('success', 'Navigation operation updated successfully!');
    }

    public function destroy($id)
    {
        $operation = NavigationOperation::findOrFail($id);
        $operation->delete();
        return redirect()->route('navigation_operations.index')->with('success', 'Navigation operation deleted successfully!');
    }
}
