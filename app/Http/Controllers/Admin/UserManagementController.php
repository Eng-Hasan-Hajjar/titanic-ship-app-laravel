<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
       // عرض المستخدمين في لوحة الإدارة
       public function index()
       {
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'employee') {
            $iduser=Auth::user()->id;
            $user = User::findOrFail($iduser);
            $user->is_approved = true;
            $user->save();
        }
        $users = User::all();
        foreach($users as $user){
            if ($user->role === 'admin' || $user->role === 'employee') {
                $user->is_approved = true;
                $user->save();
            }
        }



           return view('admin.users.index', compact('users'));
       }
       public function showByUserId($userId)
        {

        $customer = Customer::where('user_id', $userId)->first();
        if (!$customer) {
            return redirect()->route('customers2.input')->with('error','Visitor information not found, please complete the data.');
        }


            $user = User::where('id', $userId)->first();
            $users = User::all();
            return view('admin.users.view', compact('user','customer','users'));
        }


       // الموافقة على المستخدم
       public function approve(User $user)
       {
           $user->is_approved = true;
           $user->save();

           return redirect()->back()->with('success', 'User approved successfully.');
       }

       // إلغاء الموافقة على المستخدم
       public function disapprove(User $user)
       {
           $user->is_approved = false;
           $user->save();

           return redirect()->back()->with('success', 'User disapproved successfully.');
       }
}
