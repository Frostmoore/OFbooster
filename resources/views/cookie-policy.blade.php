@extends('layouts.app')

@section('title', 'Cookie Policy')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9">

        <div class="mb-4">
            <h1 class="fw-bold mb-2">Cookie Policy</h1>
            <p class="text-muted mb-0">
                Qui trovi cosa sono i cookie, quali usiamo su OFBooster e come gestire le preferenze.
                Spoiler: niente magie, solo trasparenza.
            </p>
        </div>

        <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-body p-4 p-md-5">

                <h2 class="h4 fw-bold mb-3">Cosa sono i cookie</h2>
                <p class="text-muted">
                    I cookie sono piccoli file di testo salvati sul tuo dispositivo quando visiti un sito.
                    Servono a far funzionare correttamente alcune funzioni (cookie tecnici) e, se lo consenti,
                    a raccogliere statistiche o supportare attività di marketing (cookie non necessari).
                </p>

                <hr class="my-4">

                <h2 class="h4 fw-bold mb-3">Quali cookie usiamo</h2>

                <div class="mb-4">
                    <div class="d-flex align-items-start gap-3">
                        <div class="flex-shrink-0 d-inline-flex align-items-center justify-content-center"
                             style="width:44px;height:44px;border-radius:14px;background:rgba(220,53,69,.12);color:#dc3545;">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">1) Cookie tecnici (necessari) — sempre attivi</div>
                            <div class="text-muted small">
                                Servono al funzionamento del sito (sicurezza, sessione, invio form).
                                Non richiedono consenso perché senza di loro il sito funziona male o non funziona proprio.
                            </div>

                            <ul class="text-muted small mb-0 mt-2">
                                <li><span class="fw-semibold">Sessione / autenticazione</span> (gestione navigazione e sicurezza)</li>
                                <li><span class="fw-semibold">CSRF</span> (protezione dei form contro richieste malevole)</li>
                                <li><span class="fw-semibold">Preferenze tecniche</span> (se presenti)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex align-items-start gap-3">
                        <div class="flex-shrink-0 d-inline-flex align-items-center justify-content-center"
                             style="width:44px;height:44px;border-radius:14px;background:rgba(220,53,69,.12);color:#dc3545;">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">2) Cookie analytics (statistiche) — solo con consenso</div>
                            <div class="text-muted small">
                                Se li abiliti, ci aiutano a capire cosa funziona (pagine viste, click, conversioni)
                                per migliorare il sito e le performance. Se li rifiuti, nessun problema: il sito resta utilizzabile.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex align-items-start gap-3">
                        <div class="flex-shrink-0 d-inline-flex align-items-center justify-content-center"
                             style="width:44px;height:44px;border-radius:14px;background:rgba(220,53,69,.12);color:#dc3545;">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">3) Cookie marketing (pubblicità/remarketing) — solo con consenso</div>
                            <div class="text-muted small">
                                Se li abiliti, possiamo misurare e ottimizzare campagne (es. Meta/Google) e fare remarketing.
                                Se non li abiliti, fine: niente tracciamenti marketing.
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <h2 class="h4 fw-bold mb-3">Come gestire o cambiare le preferenze</h2>
                <p class="text-muted">
                    Puoi cambiare idea quando vuoi. Premi il tasto qui sotto e imposti le preferenze.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-danger" type="button" onclick="window.openCookiePreferences && window.openCookiePreferences()">
                        <i class="fa-solid fa-sliders me-2"></i>Gestisci preferenze cookie
                    </button>
                    <a class="btn btn-outline-secondary" href="{{ route('home') }}">
                        <i class="fa-solid fa-house me-2"></i>Torna alla Home
                    </a>
                </div>

                <hr class="my-4">

                <h2 class="h4 fw-bold mb-3">Come disattivare i cookie dal browser</h2>
                <p class="text-muted">
                    Puoi anche gestire i cookie dalle impostazioni del tuo browser (bloccare, cancellare, limitare).
                    Attenzione: disattivare i cookie tecnici può rompere alcune funzioni del sito.
                </p>

                <div class="alert alert-light border mt-3 mb-0" style="border-radius: 14px;">
                    <div class="d-flex gap-2">
                        <i class="fa-solid fa-circle-info mt-1 text-danger"></i>
                        <div class="small text-muted">
                            Se vuoi la “modalità zero rogne”: lascia attivi i tecnici, e scegli tu se abilitare analytics/marketing.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="small text-muted">
            <div>Ultimo aggiornamento: {{ now()->format('d/m/Y') }}</div>
        </div>

    </div>
</div>
@endsection
