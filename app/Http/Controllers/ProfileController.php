<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        return view('register-new-user.profile', compact('data'));
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        
        if (!$data) {
            return back()->with('error', 'User not found.');
        }

        $data->name = $request->name;
        $data->branch_office = $request->branch_office;

        if ($request->filled('password')) {
            $data->password = Hash::make($request->password);
        }

        if ($data->save()) {
            return back()->with('success', 'Profile updated successfully.');
        } else {
            return back()->with('error', 'Failed to update profile.');
        }
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