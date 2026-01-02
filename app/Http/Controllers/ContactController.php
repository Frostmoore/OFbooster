<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private const DEST_EMAIL = 'ofbooster@atomicmail.io';

    public function send(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255'],
            'instagram'   => ['nullable', 'string', 'max:255'],
            'start_level' => ['nullable', 'in:zero,social,onlyfans,restart'],
            'goal'        => ['nullable', 'in:1k,3k,5k,10k,more'],
            'message'     => ['required', 'string', 'max:5000'],
            'privacy'     => ['accepted'],
        ], [
            'privacy.accepted' => 'Devi accettare l’informativa per poter inviare il messaggio.',
        ]);

        $submission = ContactSubmission::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'instagram'  => $data['instagram'] ?? null,
            'start_level'=> $data['start_level'] ?? null,
            'goal'       => $data['goal'] ?? null,
            'message'    => trim((string)$data['message']),
            'ip'         => $request->ip(),
            'user_agent' => (string)$request->userAgent(),
            'mail_sent'  => false,
        ]);

        $subject = 'Nuova richiesta contatto - OFBooster';

        $textBody = implode("\n", array_filter([
            "Nuova richiesta dal form contatti OFBooster",
            "------------------------------------------",
            "Nome: {$submission->name}",
            "Email: {$submission->email}",
            "Instagram/Social: " . ($submission->instagram ?: '—'),
            "Start: " . ($submission->start_level ?: '—'),
            "Goal: " . ($submission->goal ?: '—'),
            "",
            "Messaggio:",
            $submission->message,
            "",
            "------------------------------------------",
            "IP: " . ($submission->ip ?: '—'),
            "User-Agent: " . ($submission->user_agent ?: '—'),
            "Data: " . now()->format('d/m/Y H:i:s'),
        ]));

        try {
            Mail::raw($textBody, function ($m) use ($data, $subject) {
                $m->to(self::DEST_EMAIL)
                  ->subject($subject)
                  ->replyTo($data['email'], $data['name']);
            });

            $submission->update([
                'mail_sent' => true,
                'mail_error' => null,
            ]);

            return redirect()->route('contatti')
                ->with('success', 'Perfetto: richiesta inviata. Ti rispondiamo entro 24 ore.');
        } catch (\Throwable $e) {
            $submission->update([
                'mail_sent' => false,
                'mail_error' => $e->getMessage(),
            ]);

            Log::error('CONTACT_FORM_SEND_FAILED', [
                'err' => $e->getMessage(),
                'submission_id' => $submission->id,
            ]);

            return redirect()->route('contatti')
                ->withInput()
                ->withErrors(['email' => 'Invio fallito (problema tecnico). Riprova tra poco.']);
        }
    }
}
