@extends('layouts.app')

@section('title', 'Servizi')

@section('additional_styles')
    <style>
        .ws-hero {
            background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
                        url('https://images.unsplash.com/photo-1520975958225-7f61d0a0a9c6?auto=format&fit=crop&w=2000&q=80')
                        no-repeat center center/cover;
            border-radius: 18px;
            overflow: hidden;
        }
        .ws-hero .btn {
            border-radius: 999px;
        }
        .ws-card {
            border: 0;
            border-radius: 18px;
            transition: transform .18s ease, box-shadow .18s ease;
        }
        .ws-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 45px rgba(0,0,0,.14);
        }
        .ws-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(220,53,69,.12);
            color: #dc3545;
        }
        .ws-badge {
            background: rgba(220,53,69,.12);
            color: #dc3545;
            border: 1px solid rgba(220,53,69,.25);
        }
        .ws-step {
            border-radius: 18px;
            border: 1px solid rgba(0,0,0,.08);
            background: #fff;
        }
        .ws-faq details {
            background: #fff;
            border: 1px solid rgba(0,0,0,.08);
            border-radius: 14px;
            padding: 14px 16px;
        }
        .ws-faq summary {
            cursor: pointer;
            font-weight: 600;
        }
        .ws-faq summary::-webkit-details-marker { display: none; }
        .ws-faq summary::after {
            content: "▾";
            float: right;
            opacity: .65;
        }
        .ws-faq details[open] summary::after {
            content: "▴";
        }
    </style>
@endsection

@section('content')
    <!-- Hero -->
    <div class="ws-hero text-white p-5 mb-5">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge ws-badge rounded-pill px-3 py-2 mb-3">
                    <i class="fa-solid fa-gem me-2"></i>Servizi premium, ma con i piedi per terra
                </span>

                <h1 class="display-5 fw-bold mb-3">Cosa facciamo (e cosa no)</h1>
                <p class="lead mb-4" style="max-width: 56ch;">
                    Noi non vendiamo “motivazione”. Costruiamo un sistema: contenuti fatti bene, crescita costante,
                    e monetizzazione ottimizzata. Se vuoi fare sul serio, qui trovi un metodo.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('contatti') }}" class="btn btn-danger btn-lg px-4">
                        <i class="fa-solid fa-comments me-2"></i>Chiedi una consulenza
                    </a>
                    <a href="#pacchetti" class="btn btn-outline-light btn-lg px-4">
                        <i class="fa-solid fa-layer-group me-2"></i>Vedi i servizi
                    </a>
                </div>
            </div>

            <div class="col-lg-5 mt-4 mt-lg-0">
                <div class="bg-dark bg-opacity-50 p-4 rounded-4">
                    <div class="d-flex gap-3 mb-3">
                        <div class="ws-icon bg-white text-danger">
                            <i class="fa-solid fa-user-secret"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Discrezione prima di tutto</div>
                            <div class="opacity-75 small">Processo pulito, zero esposizione inutile.</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3">
                        <div class="ws-icon bg-white text-danger">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Crescita orientata ai risultati</div>
                            <div class="opacity-75 small">Traffico qualificato → conversione → incasso.</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="ws-icon bg-white text-danger">
                            <i class="fa-solid fa-wand-magic-sparkles"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Contenuti che vendono davvero</div>
                            <div class="opacity-75 small">Non “belli e basta”: progettati per monetizzare.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services grid -->
    <section id="pacchetti" class="mb-5">
        <div class="d-flex align-items-end justify-content-between flex-wrap gap-2 mb-3">
            <div>
                <h2 class="fw-bold mb-1">Servizi modulari</h2>
                <p class="text-muted mb-0">
                    Prendi quello che ti serve davvero. Niente pacchetti gonfiati “per fare prezzo”.
                </p>
            </div>
            <a href="{{ route('contatti') }}" class="btn btn-outline-danger">
                <i class="fa-solid fa-paper-plane me-2"></i>Richiedi un piano su misura
            </a>
        </div>

        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card ws-card h-100">
                    <div class="card-body p-4">
                        <div class="ws-icon mb-3">
                            <i class="fa-solid fa-camera fa-lg"></i>
                        </div>
                        <h5 class="card-title fw-bold">Produzione Foto & Video</h5>
                        <p class="card-text text-muted">
                            Creiamo un catalogo coerente e riutilizzabile: qualità alta, stile definito,
                            contenuti “serie” (non roba improvvisata).
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Direzione pose, styling e set</li>
                            <li>Editing, ritocco, formati per piattaforme</li>
                            <li>Teaser e varianti per social</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card ws-card h-100">
                    <div class="card-body p-4">
                        <div class="ws-icon mb-3">
                            <i class="fa-solid fa-icons fa-lg"></i>
                        </div>
                        <h5 class="card-title fw-bold">Gestione Social Media</h5>
                        <p class="card-text text-muted">
                            Strategia e pubblicazione con criterio: profilo ottimizzato, calendario editoriale,
                            copy e contenuti pensati per generare traffico utile.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Contenuti “hook” + scheduling</li>
                            <li>Analisi metriche e correzioni</li>
                            <li>Bio, funnel e link ottimizzati</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card ws-card h-100">
                    <div class="card-body p-4">
                        <div class="ws-icon mb-3">
                            <i class="fa-solid fa-bullhorn fa-lg"></i>
                        </div>
                        <h5 class="card-title fw-bold">Ads & Crescita</h5>
                        <p class="card-text text-muted">
                            Se servono, facciamo anche campagne: test, ottimizzazione e scaling.
                            Niente numerini vanitosi: puntiamo a utenti che convertono.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Creatività e targeting</li>
                            <li>Test A/B e ottimizzazione</li>
                            <li>Report chiari e controllo budget</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card ws-card h-100">
                    <div class="card-body p-4">
                        <div class="ws-icon mb-3">
                            <i class="fa-solid fa-sack-dollar fa-lg"></i>
                        </div>
                        <h5 class="card-title fw-bold">Monetizzazione & Prezzi</h5>
                        <p class="card-text text-muted">
                            Impostiamo un listino sensato e una strategia di vendita: abbonamento, PPV, bundle,
                            promo e upsell. Il tutto misurato e migliorato.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Prezzi e offerte strutturate</li>
                            <li>Funnel di conversione</li>
                            <li>Retention e ottimizzazione nel tempo</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card ws-card h-100">
                    <div class="card-body p-4">
                        <div class="ws-icon mb-3">
                            <i class="fa-solid fa-fingerprint fa-lg"></i>
                        </div>
                        <h5 class="card-title fw-bold">Brand & Posizionamento</h5>
                        <p class="card-text text-muted">
                            Stile, tono, estetica e “identità” chiara. Così non sembri una copia e diventi riconoscibile.
                            Questo fa vendere più di quanto credi.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Linee guida visual & copy</li>
                            <li>Template e format replicabili</li>
                            <li>Differenziazione e coerenza</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card ws-card h-100">
                    <div class="card-body p-4">
                        <div class="ws-icon mb-3">
                            <i class="fa-solid fa-clipboard-check fa-lg"></i>
                        </div>
                        <h5 class="card-title fw-bold">Supporto Operativo</h5>
                        <p class="card-text text-muted">
                            Ti seguiamo davvero: revisioni, feedback, roadmap e correzioni.
                            L’obiettivo è far crescere il rendimento, non “chiudere il contratto”.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Check periodici e obiettivi</li>
                            <li>Ottimizzazione continua</li>
                            <li>Supporto pratico e rapido</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How it works -->
    <section class="mb-5">
        <h2 class="fw-bold mb-3">Come funziona (in tre passaggi)</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="ws-step p-4 h-100">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="badge bg-danger rounded-pill px-3 py-2">1</span>
                        <h5 class="mb-0 fw-bold">Audit iniziale</h5>
                    </div>
                    <p class="text-muted mb-0">
                        Capire punto di partenza e obiettivo. Se sei all’inizio, si imposta tutto nel modo giusto.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ws-step p-4 h-100">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="badge bg-danger rounded-pill px-3 py-2">2</span>
                        <h5 class="mb-0 fw-bold">Setup + contenuti</h5>
                    </div>
                    <p class="text-muted mb-0">
                        Produzione, strategia e calendario: mettiamo ordine e iniziamo a generare traffico utile.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ws-step p-4 h-100">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="badge bg-danger rounded-pill px-3 py-2">3</span>
                        <h5 class="mb-0 fw-bold">Ottimizzazione continua</h5>
                    </div>
                    <p class="text-muted mb-0">
                        Guardiamo i numeri, sistemiamo ciò che non rende e spingiamo ciò che funziona. Ogni mese meglio.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="ws-faq mb-5">
        <h2 class="fw-bold mb-3">Domande che ci fanno sempre</h2>
        <div class="row g-3">
            <div class="col-lg-6">
                <details>
                    <summary>Devo avere già un profilo avviato?</summary>
                    <div class="text-muted mt-2">
                        No. Partiamo da zero oppure facciamo un “rilancio” se hai iniziato ma non sta rendendo.
                    </div>
                </details>
            </div>
            <div class="col-lg-6">
                <details>
                    <summary>Vendete pacchetti standard o è tutto su misura?</summary>
                    <div class="text-muted mt-2">
                        È modulare: scegliamo insieme cosa serve. Se ti serve solo produzione, stop. Se serve un sistema completo, lo facciamo.
                    </div>
                </details>
            </div>
            <div class="col-lg-6">
                <details>
                    <summary>Quando si vedono i primi risultati?</summary>
                    <div class="text-muted mt-2">
                        Dipende da punto di partenza e costanza. In genere: setup nelle prime settimane, poi crescita e ottimizzazione mese su mese.
                    </div>
                </details>
            </div>
            <div class="col-lg-6">
                <details>
                    <summary>Gestite anche privacy e protezione del brand?</summary>
                    <div class="text-muted mt-2">
                        Sì, per quanto dipende da contenuti e pubblicazione. Non promettiamo “zero rischi”, ma evitiamo errori stupidi e exposure inutile.
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="p-5 rounded-4 text-white" style="background: #dc3545;">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-2">Vuoi un piano realistico, non “a sensazione”?</h2>
                <p class="mb-0 opacity-90">
                    Scrivici: punto di partenza + obiettivo. Ti diciamo cosa fare, quanto serve e cosa aspettarti. Senza fuffa.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('contatti') }}" class="btn btn-dark btn-lg px-4">
                    <i class="fa-solid fa-comments me-2"></i>Richiedi la consulenza
                </a>
            </div>
        </div>
    </section>
@endsection
