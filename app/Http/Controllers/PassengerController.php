<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassengerController extends Controller
{
     /**
     * Display a listing of the passengers.
     */
    public function index()
    {
        $user = auth()->user();
        // جلب جميع المسافرين من قاعدة البيانات
        $passengers = Passenger::all();
        $users = User::all();

        // عرض قائمة المسافرين في الواجهة
        return view('backend.passengers.index', compact('passengers', 'users'));
    }

    /**
     * Show the form for creating a new passenger.
     */
    public function create(Request $request)
    {
        // تحقق مما إذا كان مديرًا وإذا لم يكن لديه معرف المستخدم (user_id)
        if ((auth()->user()->role === 'admin' || auth()->user()->role === 'employee') && !$request->has('user_id')) {
            Auth::logout(); // تسجيل خروج المدير
            return redirect()->route('register')
                             ->with('info', 'Please create a new user account first.');
        }

        // عرض نموذج إنشاء مسافر جديد
        return view('backend.passengers.create');
    }

    /**
     * Store a newly created passenger in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $messages = [
            'name.required' => 'The name field is required.',
            'phone.required' => 'The phone number field is required.',
            'phone.numeric' => 'The phone number is not valid.',
            'nationality.required' => 'The nationality field is required.',
            'gender.required' => 'The gender field is required.',
            'birthday.required' => 'The date of birth field is required.',
        ];

        $request->validate([
            'phone' => 'required|numeric',
            'nationality' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
        ], $messages);

        // الحصول على المستخدم المسجل
        $user = auth()->user();
        $passenger = new Passenger($request->all());
        $user->passenger()->save($passenger); // الربط بين المسافر والمستخدم

        // التحقق من وجود المستخدم
        if ($user && $user->role == 'passenger') {
            return redirect()->route('passengers.show', $passenger->id)
                             ->with('success', 'Passenger created successfully.');
        }

        return redirect()->route('passengers.index')
                         ->with('success', 'Passenger created successfully.');
    }

    /**
     * Display the specified passenger.
     */
    public function show(Passenger $passenger)
    {
        $user = auth()->user();
        $users = User::all();
        return view('backend.passengers.show', compact('passenger', 'users'));
    }
    public function showPassengerByUserId($userId)
    {
        $passenger = Passenger::where('user_id', $userId)->first();
        if (!$passenger) {
            return redirect()->route('passengers2.input')->with('error','Passenger information not found, please complete the data.');
        }
        $user = User::where('id', $userId)->first();
        return view('backend.passengers.showyou', compact('passenger','user'));
    }
    /**
     * Show the form for editing the specified passenger.
     */
    public function edit(Passenger $passenger)
    {
        $user = auth()->user();
        return view('backend.passengers.edit', compact('passenger', 'user'));
    }
    public function edityou(Passenger $passenger)
    {
        return view('backend.passengers.edityou',compact('passenger'));
    }
    /**
     * Update the specified passenger in storage.
     */
    public function update(Request $request, Passenger $passenger)
    {
        // التحقق من صحة البيانات المدخلة
        $messages = [
            'name.required' => 'The name field is required.',
            'phone.required' => 'The phone number field is required.',
            'phone.numeric' => 'The phone number is not valid.',
            'nationality.required' => 'The nationality field is required.',
            'gender.required' => 'The gender field is required.',
            'birthday.required' => 'The date of birth field is required.',
        ];

        $request->validate([
            'phone' => 'required|numeric',
            'nationality' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
        ], $messages);

        // تحديث بيانات المسافر
        $passenger->update($request->all());

        // التحقق من نوع المستخدم
        if (Auth::user()->role === 'passenger') {
            return redirect()->route('dashboard')
                             ->with('success', 'Your information has been updated successfully.');
        }

        return redirect()->route('passengers.index')
                         ->with('success', 'Passenger updated successfully.');
    }

    /**
     * Remove the specified passenger from storage.
     */
    public function destroy(Passenger $passenger)
    {
        // حذف المسافر
        $passenger->delete();

        return redirect()->route('passengers.index')
                         ->with('success', 'Passenger deleted successfully.');
    }



    public function input()
    {
        return view('backend.passengers.input');
    }
    public function input2(Request $request)
    {
        $messages = [
            'name.required' => 'The name field is required.',
            'phone.required' => 'The phone number field is required.',
            'phone.numeric' => 'The phone number is not valid.',
            'specialty.required' => 'The specialty field is required.',
            'work.required' => 'The work field is required.',
            'nationality.required' => 'The nationality field is required.',
            'current_location.required' => 'The current location field is required.',
            'gender.required' => 'The gender field is required.',
            'birthday.required' => 'The date of birth field is required.',
        ];

        $request->validate([
            'phone'=> 'required|numeric',
            'work'=>  'required',
            'nationality'=> 'required',
            'current_location' => 'required',
            'gender'=>  'required',
            'birthday'=> 'required',

        ], $messages);
//dd($request);
          // الحصول على المستخدم المسجل
        $user = auth()->user();
        $passenger = new Passenger($request->all());
        $user->passenger()->save($passenger);
          // التحقق من وجود المستخدم
        if ($user) {
            $passenger = $user->passenger;
            return view('backend.passengers.showyou', compact('passenger','user'));
        }
        return redirect()->route('passengers.index')
                        ->with('success','Updated successfully');
    }


}
