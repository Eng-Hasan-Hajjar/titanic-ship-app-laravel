<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $messages = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',

            'password.required' => 'The password field is required.',
            'role.required' => 'The role field is required.',


        ];
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string'],
            'image' => ['image','max:2048'],
        ],$messages);
        // معالجة الصورة إذا تم تحميلها
        $new_name = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = time() . '_' . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'image' => $new_name,
        ]);
//dd($request);
        event(new Registered($user));

        Auth::login($user);

      //  return redirect(RouteServiceProvider::HOME);
      if( $user->role== 'employee' ) return redirect(RouteServiceProvider::HOME);
      else return redirect()->route('customers2.input');
         // تحديث هذا الجزء لتوجيه المستخدم إلى واجهة إدخال بيانات الزائر بعد تسجيل الدخول

  }

  protected function authenticated(Request $request, $user)
  {
      if (!$user->is_approved) {
          Auth::logout();
          return redirect()->route('approval_required');
      }
  }

}
