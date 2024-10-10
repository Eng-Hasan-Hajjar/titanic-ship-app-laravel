<?php

namespace App\Http\Controllers;

use App\Models\FoodOrder;
use App\Models\Menu;
use App\Models\Pool;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Room;
use App\Models\User;



class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetching counts for different user roles
        $customerCount = User::where('role', 'customer')->count();
        $adminCount = User::where('role', 'admin')->count();
        $employeeCount = User::where('role', 'employee')->count();



        $roomsCount = Room::count();
        $restaurantCount = Restaurant::count();
        $foodOrderCount = FoodOrder::count();
        $menuCount = Menu::count();
        $reservationCount = Reservation::count();
        $poolCount = Pool::count();


        // Passing all data to the view
        return view('layouts.app', compact(
            'customerCount', 'adminCount', 'employeeCount',
            'roomsCount' , 'restaurantCount','foodOrderCount',
            'menuCount','reservationCount','poolCount'
        ));
    }
    public function approveUsers()
    {
        $users = User::where('is_approved', false)->get();
        return view('admin.approve_users', compact('users'));
    }

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();

        return redirect()->route('admin.approve_users')->with('success', 'User approved successfully.');
    }
}
