@extends('layouts.app')

@section('title', 'Home')

@section('additional_styles')
    <style>
        .hero-logo {
            max-width: 520px;
            width: 78%;
            height: auto;
            display: inline-block;
            margin-bottom: 1.5rem;
            filter: drop-shadow(0 10px 24px rgba(0,0,0,.45));
        }
        @media (max-width: 576px) {
            .hero-logo { width: 90%; }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero text-white text-center position-relative overflow-hidden"
        style="background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),
                url('https://media.okmagazine.com/brand-img/JMAUW6xpJ/0x0/model-candice-huffine-confidence-fashion-lingerie-luvlette-1693450401392.jpg')
                no-repeat center center/cover;
               height: 90vh; display: flex; align-items: center;">
        <div class="container">
            <img class="hero-logo" src="{{ asset('images/ofbooster-logo.png') }}" alt="OFBooster">

            <h2 class="display-5 mb-4">Fatti pagare davvero per i tuoi contenuti</h2>
            <p class="lead mb-5 fs-4">
                Non ti servono “trucchi”: ti serve un sistema.<br>
                Produzione contenuti, crescita social e strategie di monetizzazione — con un team che ti segue passo passo.
            </p>

            <a href="{{ route('contatti') }}" class="btn btn-lg btn-danger me-3">
                Richiedi una consulenza gratuita
            </a>
            <a href="{{ route('servizi') }}" class="btn btn-lg btn-outline-light">
                Guarda cosa facciamo
            </a>
        </div>
    </section>

    <!-- Perché Sceglierci -->
    <section class="py-5 bg-dark text-white">
        <div class="container">
            <h2 class="text-center mb-5">
                Tre cose che fanno la differenza (davvero)
            </h2>

            <div class="row text-center">
                <div class="col-md-4 mb-5">
                    <div class="bg-danger rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center"
                        style="width: 120px; height: 120px;">
                        <i class="fa-solid fa-camera fa-4x text-white"></i>
                    </div>
                    <h4>Contenuti che sembrano… professionali</h4>
                    <p>
                        Shooting e video pensati per vendere: luce, pose, styling, editing e format pronti per social e piattaforme.
                        Tu devi solo metterci la presenza. Al resto pensiamo noi.
                    </p>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="bg-danger rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center"
                        style="width: 120px; height: 120px;">
                        <i class="fa-solid fa-chart-line fa-4x text-white"></i>
                    </div>
                    <h4>Traffico costante, non “botte di fortuna”</h4>
                    <p>
                        Strategia, calendario e crescita su misura: contenuti, promozione e ads (se servono) per portare
                        persone interessate — non follower inutili.
                    </p>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="bg-danger rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center"
                        style="width: 120px; height: 120px;">
                        <i class="fa-solid fa-euro-sign fa-4x text-white"></i>
                    </div>
                    <h4>Monetizzazione fatta con cervello</h4>
                    <p>
                        Prezzi, PPV, bundle, promo e upsell: impostiamo un listino sensato e ottimizziamo la conversione.
                        Obiettivo: aumentare incassi e stabilità mese dopo mese.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Finale -->
    <section class="py-5 bg-danger text-white text-center">
        <div class="container">
            <h2 class="mb-4 display-5">Vuoi capire se può funzionare anche per te?</h2>
            <p class="lead mb-5">
                Scrivici due righe: punto di partenza + obiettivo. Ti rispondiamo con un piano realistico, senza fumo negli occhi.
            </p>
            <a href="{{ route('contatti') }}" class="btn btn-lg btn-dark px-5 py-3 fs-5">
                Parliamone adesso
            </a>
            <p class="mt-4 mb-0">Risposta entro 24 ore (di solito molto prima).</p>
        </div>
    </section>
@endsection
