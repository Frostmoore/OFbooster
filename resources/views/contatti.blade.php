@extends('layouts.app')

@section('title', 'Contatti')

@section('additional_styles')
    <style>
        .ws-hero {
            background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
                        url('https://images.unsplash.com/photo-1520975682030-1b5b4f3a6c7e?auto=format&fit=crop&w=2000&q=80')
                        no-repeat center center/cover;
            border-radius: 18px;
            overflow: hidden;
        }
        .ws-card {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(0,0,0,.10);
        }
        .ws-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(220,53,69,.12);
            color: #dc3545;
        }
        .ws-muted {
            color: rgba(255,255,255,.82);
        }
        .ws-pill {
            border-radius: 999px;
        }
        .ws-form .form-control,
        .ws-form textarea {
            border-radius: 14px;
            padding: .85rem 1rem;
        }
        .ws-form .form-control:focus,
        .ws-form textarea:focus {
            box-shadow: 0 0 0 .25rem rgba(220,53,69,.15);
            border-color: rgba(220,53,69,.45);
        }
        .ws-form .btn {
            border-radius: 999px;
            padding: .85rem 1.25rem;
        }
        .ws-note {
            background: rgba(220,53,69,.06);
            border: 1px solid rgba(220,53,69,.18);
            border-radius: 14px;
            padding: 12px 14px;
        }
        .ws-quick a { text-decoration: none; }
        .ws-quick .list-group-item {
            border-radius: 14px !important;
            border: 1px solid rgba(0,0,0,.08);
        }
    </style>
@endsection

@section('content')
    <!-- Hero -->
    <div class="ws-hero text-white p-5 mb-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-danger ws-pill px-3 py-2 mb-3">
                    <i class="fa-solid fa-envelope-open-text me-2"></i>Richiesta informazioni
                </span>

                <h1 class="display-5 fw-bold mb-2">Parliamone</h1>
                <p class="lead ws-muted mb-0" style="max-width: 62ch;">
                    Compila il form: ti rispondiamo con una proposta chiara e realistica.
                    Se non ha senso lavorare insieme, te lo diciamo subito — senza farti perdere tempo.
                </p>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="bg-dark bg-opacity-50 p-4 rounded-4">
                    <div class="d-flex gap-3 mb-3">
                        <div class="ws-icon bg-white text-danger">
                            <i class="fa-solid fa-stopwatch"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Tempi rapidi</div>
                            <div class="opacity-75 small">Risposta in genere entro 24 ore.</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3">
                        <div class="ws-icon bg-white text-danger">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Riservatezza</div>
                            <div class="opacity-75 small">Trattiamo i dati con discrezione.</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="ws-icon bg-white text-danger">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Su misura</div>
                            <div class="opacity-75 small">Solo servizi utili al tuo obiettivo.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Feedback --}}
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center gap-2">
            <i class="fa-solid fa-circle-check"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <div class="fw-bold mb-2"><i class="fa-solid fa-triangle-exclamation me-2"></i>Controlla questi campi:</div>
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4">
        <!-- Form -->
        <div class="col-lg-7">
            <div class="card ws-card" id="form">
                <div class="card-body p-4 p-md-5">
                    <h2 class="h4 fw-bold mb-1">Dicci obiettivo e punto di partenza</h2>
                    <p class="text-muted mb-4">
                        Più sei precisa, più possiamo risponderti bene. Anche due righe vanno benissimo:
                        <span class="fw-semibold">dove sei ora</span> + <span class="fw-semibold">dove vuoi arrivare</span>.
                    </p>

                    <form class="ws-form" action="{{ route('contatti.send') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nome</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Es. Giulia"
                                required
                                autocomplete="name"
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Es. giulia@email.com"
                                required
                                autocomplete="email"
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label fw-semibold">Messaggio</label>
                            <textarea
                                class="form-control @error('message') is-invalid @enderror"
                                id="message"
                                name="message"
                                rows="6"
                                required
                                placeholder="Esempio: ho già IG con X follower / parto da zero / obiettivo: X€ al mese / disponibilità per shooting a... / cosa vuoi gestire tu e cosa vuoi delegare."
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="ws-note mb-4">
                            <div class="d-flex gap-2">
                                <i class="fa-solid fa-circle-info mt-1 text-danger"></i>
                                <div class="small text-muted">
                                    Non chiediamo link pubblici o informazioni inutili. Se serve, approfondiamo dopo in privato.
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fa-solid fa-paper-plane me-2"></i>Invia richiesta
                            </button>
                            <a href="{{ route('servizi') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="fa-solid fa-arrow-left me-2"></i>Torna ai servizi
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-5">
            <div class="card ws-card mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-3">Cosa succede dopo</h3>

                    <div class="d-flex gap-3 mb-3">
                        <div class="ws-icon">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">1) Valutazione rapida</div>
                            <div class="text-muted small">Leggiamo richiesta e capiamo se ha senso.</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3">
                        <div class="ws-icon">
                            <i class="fa-solid fa-diagram-project"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">2) Proposta operativa</div>
                            <div class="text-muted small">Step chiari: cosa fare, cosa evitare, priorità.</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="ws-icon">
                            <i class="fa-solid fa-rocket"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">3) Si parte</div>
                            <div class="text-muted small">Contenuti, funnel, crescita: si lavora con continuità.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ws-card">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-3">Info rapide</h3>
                    <div class="list-group ws-quick">
                        <div class="list-group-item d-flex align-items-center gap-3 py-3">
                            <div class="ws-icon">
                                <i class="fa-solid fa-at"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Email</div>
                                <div class="text-muted small">Ti rispondiamo con calma ma in fretta</div>
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-center gap-3 py-3">
                            <div class="ws-icon">
                                <i class="fa-solid fa-user-lock"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Riservatezza</div>
                                <div class="text-muted small">Niente condivisioni, niente esposizione</div>
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-center gap-3 py-3">
                            <div class="ws-icon">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Non sai cosa scrivere?</div>
                                <div class="text-muted small">Obiettivo mensile + punto di partenza</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 p-4 rounded-4 text-white" style="background:#dc3545;">
                        <div class="fw-bold mb-1">Vuoi fare in fretta?</div>
                        <div class="opacity-90 small mb-3">
                            Scrivi: (1) punto di partenza, (2) obiettivo mensile, (3) città/disponibilità per shooting.
                            Ti rispondiamo con il minimo percorso sensato.
                        </div>
                        <a href="#form" class="btn btn-dark ws-pill w-100">
                            <i class="fa-solid fa-bolt me-2"></i>Ok, scrivo adesso
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
