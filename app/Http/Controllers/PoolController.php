<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function index()
    {
        $pools = Pool::all();
        return view('pools.index', compact('pools'));
    }

    public function create()
    {
        return view('pools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pool_name' => 'required|unique:pools',
            'depth' => 'required|numeric',
            'capacity' => 'required|integer',
            'water_type' => 'required',
        ]);

        Pool::create($request->all());
        return redirect()->route('pools.index');
    }

    public function show(Pool $pool)
    {
        return view('pools.show', compact('pool'));
    }

    public function edit(Pool $pool)
    {
        return view('pools.edit', compact('pool'));
    }

    public function update(Request $request, Pool $pool)
    {
        $request->validate([
            'pool_name' => 'required|unique:pools,pool_name,' . $pool->id,
            'depth' => 'required|numeric',
            'capacity' => 'required|integer',
            'water_type' => 'required',
        ]);

        $pool->update($request->all());
        return redirect()->route('pools.index');
    }

    public function destroy(Pool $pool)
    {
        $pool->delete();
        return redirect()->route('pools.index');
    }
}
