<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\FacebookPage;
use App\Models\InstagramAccount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
// This will work and generate everything properly.

use App\Models\User;
use App\Models\YouTubeChannel;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $customerCount = User::where('role', 'customer')->count();
        $adminCount = User::where('role', 'admin')->count();
        $employeeCount = User::where('role', 'employee')->count();


        // Fetching counts for social media accounts
        $facebookPageCount = FacebookPage::count();
        $instagramAccountCount = InstagramAccount::count();
        $youtubeChannelCount = YouTubeChannel::count();

        return view('profile.edit', [
            'user' => $request->user(),
        ], compact(
            'customerCount', 'adminCount', 'employeeCount',
             'facebookPageCount',
            'instagramAccountCount', 'youtubeChannelCount',
        ));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
