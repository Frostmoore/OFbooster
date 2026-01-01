<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Placeholder per invio email (configura Mail in config/mail.php e .env)
        // Mail::to('tuo@email.com')->send(new ContactMail($request->all()));

        return redirect()->route('contatti')->with('success', 'Messaggio inviato con successo!');
    }
}