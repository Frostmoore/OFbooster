<?php

namespace App\Http\Controllers;

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

        $startMap = [
            'zero'     => 'Da zero (nessun profilo / profilo vuoto)',
            'social'   => 'Social attivi ma niente funnel',
            'onlyfans' => 'OnlyFans già attivo ma rende poco',
            'restart'  => 'Ripartenza / rilancio',
        ];

        $goalMap = [
            '1k'   => '1.000€/mese',
            '3k'   => '3.000€/mese',
            '5k'   => '5.000€/mese',
            '10k'  => '10.000€/mese',
            'more' => 'Oltre 10.000€/mese',
        ];

        $subject = 'Nuova richiesta contatto - OFBooster';

        $textBody = implode("\n", array_filter([
            "Nuova richiesta dal form contatti OFBooster",
            "------------------------------------------",
            "Nome: {$data['name']}",
            "Email: {$data['email']}",
            "Instagram/Social: " . (!empty($data['instagram']) ? trim($data['instagram']) : '—'),
            "Da dove parte: " . (!empty($data['start_level']) ? ($startMap[$data['start_level']] ?? $data['start_level']) : '—'),
            "Obiettivo: " . (!empty($data['goal']) ? ($goalMap[$data['goal']] ?? $data['goal']) : '—'),
            "",
            "Messaggio:",
            trim($data['message']),
            "",
            "------------------------------------------",
            "IP: " . $request->ip(),
            "User-Agent: " . (string) $request->userAgent(),
            "Data: " . now()->format('d/m/Y H:i:s'),
        ]));

        try {
            // ✅ modo corretto con Symfony Mailer: raw text
            Mail::raw($textBody, function ($m) use ($data, $subject) {
                $m->to(self::DEST_EMAIL)
                  ->subject($subject)
                  ->replyTo($data['email'], $data['name']);
            });

            return redirect()
                ->route('contatti')
                ->with('success', 'Perfetto: richiesta inviata. Ti rispondiamo entro 24 ore.');
        } catch (\Throwable $e) {
            Log::error('CONTACT_FORM_SEND_FAILED', [
                'err'     => $e->getMessage(),
                'payload' => [
                    'name' => $data['name'] ?? null,
                    'email' => $data['email'] ?? null,
                    'instagram' => $data['instagram'] ?? null,
                    'start_level' => $data['start_level'] ?? null,
                    'goal' => $data['goal'] ?? null,
                ],
            ]);

            return redirect()
                ->route('contatti')
                ->withInput()
                ->withErrors([
                    'email' => 'Invio fallito (problema tecnico). Riprova tra poco.',
                ]);
        }
    }
}
