<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RescueOperationController extends Controller
{
    public function index()
    {
        $operations = RescueOperation::all();
        return view('rescue_operations.index', compact('operations'));
    }

    public function create()
    {
        return view('rescue_operations.create');
    }

    public function store(Request $request)
    {
        RescueOperation::create($request->all());
        return redirect()->route('rescue_operations.index')->with('success', 'Rescue operation reported successfully!');
    }

    public function show($id)
    {
        $operation = RescueOperation::findOrFail($id);
        return view('rescue_operations.show', compact('operation'));
    }

    public function update(Request $request, $id)
    {
        $operation = RescueOperation::findOrFail($id);
        $operation->update($request->all());
        return redirect()->route('rescue_operations.index')->with('success', 'Rescue operation updated successfully!');
    }

    public function destroy($id)
    {
        $operation = RescueOperation::findOrFail($id);
        $operation->delete();
        return redirect()->route('rescue_operations.index')->with('success', 'Rescue operation deleted successfully!');
    }
}
