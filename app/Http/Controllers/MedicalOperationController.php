<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalOperationController extends Controller
{
    public function index()
    {
        $operations = MedicalOperation::all();
        return view('medical_operations.index', compact('operations'));
    }

    public function create()
    {
        return view('medical_operations.create');
    }

    public function store(Request $request)
    {
        MedicalOperation::create($request->all());
        return redirect()->route('medical_operations.index')->with('success', 'Medical operation reported successfully!');
    }

    public function show($id)
    {
        $operation = MedicalOperation::findOrFail($id);
        return view('medical_operations.show', compact('operation'));
    }

    public function update(Request $request, $id)
    {
        $operation = MedicalOperation::findOrFail($id);
        $operation->update($request->all());
        return redirect()->route('medical_operations.index')->with('success', 'Medical operation updated successfully!');
    }

    public function destroy($id)
    {
        $operation = MedicalOperation::findOrFail($id);
        $operation->delete();
        return redirect()->route('medical_operations.index')->with('success', 'Medical operation deleted successfully!');
    }
}
