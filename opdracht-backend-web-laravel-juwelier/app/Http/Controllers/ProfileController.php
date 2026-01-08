<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

        // Basis validatie
        $rules = [
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'birthday' => 'nullable|date|before:today',
            'about_me' => 'nullable|string|max:500',
            'profile_photo' => 'nullable|image|max:2048',
        ];

        // Als wachtwoord wordt gewijzigd, voeg extra validatie toe
        if ($request->filled('current_password') || $request->filled('password')) {
            $rules['current_password'] = 'required|current_password';
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $validated = $request->validate($rules, [
            'username.unique' => 'Deze gebruikersnaam is al in gebruik',
            'birthday.before' => 'Verjaardag moet in het verleden zijn',
            'about_me.max' => 'Over mij mag maximaal 500 karakters bevatten',
            'profile_photo.image' => 'Bestand moet een afbeelding zijn',
            'profile_photo.max' => 'Afbeelding mag maximaal 2MB zijn',
            'current_password.required' => 'Huidig wachtwoord is verplicht om een nieuw wachtwoord in te stellen',
            'current_password.current_password' => 'Het huidige wachtwoord is onjuist',
            'password.required' => 'Nieuw wachtwoord is verplicht',
            'password.min' => 'Wachtwoord moet minimaal 8 karakters bevatten',
            'password.confirmed' => 'Wachtwoord bevestiging komt niet overeen',
        ]);

        // Update profielfoto
        if ($request->hasFile('profile_photo')) {
            // Verwijder oude foto
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $validated['profile_photo'] = $path;
        }

        // Update wachtwoord als ingevuld
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        // Verwijder velden die niet in database horen
        unset($validated['current_password']);
        unset($validated['password_confirmation']);

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
