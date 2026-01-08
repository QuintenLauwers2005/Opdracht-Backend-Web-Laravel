<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'birthday' => 'nullable|date|before:today',
            'about_me' => 'nullable|string|max:500',
            'profile_photo' => 'nullable|image|max:2048',
            'current_password' => 'nullable|required_with:password|current_password',  // ← NIEUW
            'password' => 'nullable|min:8|confirmed',  // ← NIEUW
        ], [
            'current_password.current_password' => 'Het huidige wachtwoord is onjuist.',
            'password.min' => 'Het nieuwe wachtwoord moet minimaal 8 karakters zijn.',
            'password.confirmed' => 'De wachtwoord bevestiging komt niet overeen.',
        ]);

        // Update profielfoto
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $validated['profile_photo'] = $path;
        }

        // Update wachtwoord (NIEUW!)
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Verwijder current_password uit validated (niet opslaan in database)
        unset($validated['current_password']);

        $user->update($validated);

        return redirect()->route('profile.show', $user)
            ->with('success', 'Profiel succesvol bijgewerkt!');
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
