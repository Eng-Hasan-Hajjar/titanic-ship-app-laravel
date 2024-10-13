<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityIncidentController extends Controller
{
    public function index()
    {
        $incidents = SecurityIncident::all();
        return view('security_incidents.index', compact('incidents'));
    }

    public function create()
    {
        return view('security_incidents.create');
    }

    public function store(Request $request)
    {
        SecurityIncident::create($request->all());
        return redirect()->route('security_incidents.index')->with('success', 'Security incident reported successfully!');
    }

    public function show($id)
    {
        $incident = SecurityIncident::findOrFail($id);
        return view('security_incidents.show', compact('incident'));
    }

    public function update(Request $request, $id)
    {
        $incident = SecurityIncident::findOrFail($id);
        $incident->update($request->all());
        return redirect()->route('security_incidents.index')->with('success', 'Security incident updated successfully!');
    }

    public function destroy($id)
    {
        $incident = SecurityIncident::findOrFail($id);
        $incident->delete();
        return redirect()->route('security_incidents.index')->with('success', 'Security incident deleted successfully!');
    }
}
