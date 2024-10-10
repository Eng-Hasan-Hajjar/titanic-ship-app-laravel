<?php

namespace App\Http\Controllers;

use App\Models\FoodOrder;
use Illuminate\Http\Request;

class FoodOrderController extends Controller
{
    public function index()
    {
        $foodOrders = FoodOrder::with(['customer', 'menu'])->get();
        return view('food_orders.index', compact('foodOrders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $menus = Menu::all();
        return view('food_orders.create', compact('customers', 'menus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->menu_id);
        $total_price = $menu->price * $request->quantity;

        FoodOrder::create([
            'customer_id' => $request->customer_id,
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        return redirect()->route('food_orders.index')->with('success', 'Food order created successfully.');
    }

    public function show(FoodOrder $foodOrder)
    {
        return view('food_orders.show', compact('foodOrder'));
    }

    public function edit(FoodOrder $foodOrder)
    {
        $customers = Customer::all();
        $menus = Menu::all();
        return view('food_orders.edit', compact('foodOrder', 'customers', 'menus'));
    }

    public function update(Request $request, FoodOrder $foodOrder)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->menu_id);
        $total_price = $menu->price * $request->quantity;

        $foodOrder->update([
            'customer_id' => $request->customer_id,
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        return redirect()->route('food_orders.index')->with('success', 'Food order updated successfully.');
    }

    public function destroy(FoodOrder $foodOrder)
    {
        $foodOrder->delete();

        return redirect()->route('food_orders.index')->with('success', 'Food order deleted successfully.');
    }
}
