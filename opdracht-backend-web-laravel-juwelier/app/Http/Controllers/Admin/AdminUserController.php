<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_admin'] = $request->has('is_admin');

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker aangemaakt!');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker bijgewerkt!');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Je kunt jezelf niet verwijderen!');
        }

        if ($user->email === 'admin@ehb.be') {
            return redirect()->route('admin.users.index')
                ->with('error', 'De hoofdadmin kan niet verwijderd worden!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker verwijderd!');
    }

    public function toggleAdmin(User $user)
    {
        if ($user->email === 'admin@ehb.be') {
            return redirect()->route('admin.users.index')
                ->with('error', 'De hoofdadmin rechten kunnen niet worden aangepast!');
        }

        $user->update(['is_admin' => !$user->is_admin]);

        $message = $user->is_admin
            ? 'Gebruiker is nu admin!'
            : 'Admin rechten zijn verwijderd!';

        return redirect()->route('admin.users.index')
            ->with('success', $message);
    }
}
