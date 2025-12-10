<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ], [
            'name.required' => 'Naam is verplicht',
            'email.required' => 'E-mail is verplicht',
            'email.email' => 'Vul een geldig e-mailadres in',
            'subject.required' => 'Onderwerp is verplicht',
            'message.required' => 'Bericht is verplicht',
            'message.min' => 'Bericht moet minimaal 10 karakters bevatten',
        ]);

        ContactMessage::create($validated);

        Mail::raw(
            "Nieuw contactbericht van {$validated['name']} ({$validated['email']})\n\nOnderwerp: {$validated['subject']}\n\nBericht:\n{$validated['message']}",
            function ($message) use ($validated) {
                $message->to('admin@ehb.be')
                    ->subject('Nieuw contactbericht: ' . $validated['subject']);
            }
        );

        return redirect()->route('contact.create')
            ->with('success', 'Uw bericht is verzonden! We nemen zo snel mogelijk contact met u op.');
    }
}
