<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - OFBooster</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome globale -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          crossorigin="anonymous"
          referrerpolicy="no-referrer">

    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; }
        .navbar { background-color: #343a40; }
        .footer { background-color: #343a40; color: white; padding: 20px; text-align: center; }

        /* Logo navbar */
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: .5rem;
        }
        .navbar-brand img {
            height: 34px;
            width: auto;
            display: block;
        }
    </style>

    @yield('additional_styles')
</head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/ofbooster-logo.png') }}" alt="OFBooster">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('servizi') }}">Servizi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contatti') }}">Contatti</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container my-5">
            @yield('content')
        </main>

        <footer class="footer">
            &copy; 2026 OFBooster. Tutti i diritti riservati. | Management per Modelle OnlyFans.
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Cookie Banner -->
        <div id="cookie-banner" class="position-fixed bottom-0 start-0 end-0 p-3" style="z-index: 9999; display:none;">
            <div class="container">
                <div class="card shadow-lg border-0" style="border-radius: 16px;">
                    <div class="card-body p-4">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="flex-shrink-0 d-none d-md-inline-flex align-items-center justify-content-center"
                                style="width:48px;height:48px;border-radius:14px;background:rgba(220,53,69,.12);color:#dc3545;">
                                <i class="fa-solid fa-cookie-bite fa-lg"></i>
                            </div>

                            <div class="flex-grow-1">
                                <div class="fw-bold mb-1">Cookie & privacy</div>
                                <div class="text-muted small mb-3">
                                    Usiamo cookie tecnici (necessari al sito) e, solo se lo consenti, cookie di analisi/marketing
                                    per misurare le performance e migliorare le campagne. Puoi rifiutare o scegliere le preferenze.
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-danger" id="cookie-accept-all">
                                        <i class="fa-solid fa-check me-2"></i>Accetta tutti
                                    </button>
                                    <button class="btn btn-outline-secondary" id="cookie-reject-all">
                                        <i class="fa-solid fa-xmark me-2"></i>Rifiuta
                                    </button>
                                    <button class="btn btn-outline-danger" id="cookie-open-prefs">
                                        <i class="fa-solid fa-sliders me-2"></i>Preferenze
                                    </button>

                                    <a class="btn btn-link text-decoration-none ms-auto" href="{{ route('cookie-policy') }}">
                                        Leggi la cookie policy
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cookie Preferences Modal -->
        <div class="modal fade" id="cookiePrefsModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 16px;">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Preferenze cookie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="fw-semibold">Cookie tecnici</div>
                            <div class="text-muted small">Sempre attivi. Servono al funzionamento del sito (sessione, sicurezza, form).</div>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <label class="form-check-label text-muted">Necessari (obbligatori)</label>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <div class="fw-semibold">Analytics</div>
                            <div class="text-muted small">Ci aiutano a capire cosa funziona (es. visite, pagine viste, conversioni).</div>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" id="cookie-analytics">
                                <label class="form-check-label">Abilita analytics</label>
                            </div>
                        </div>

                        <div>
                            <div class="fw-semibold">Marketing</div>
                            <div class="text-muted small">Usati per campagne e remarketing (es. Meta/Google Ads), solo con consenso.</div>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" id="cookie-marketing">
                                <label class="form-check-label">Abilita marketing</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                        <button class="btn btn-danger" id="cookie-save-prefs">
                            <i class="fa-solid fa-floppy-disk me-2"></i>Salva preferenze
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
        (function () {
            const KEY = 'ofbooster_cookie_consent_v1';

            // consent object: { necessary:true, analytics:boolean, marketing:boolean, ts:number }
            function getConsent() {
                try { return JSON.parse(localStorage.getItem(KEY) || 'null'); } catch { return null; }
            }
            function setConsent(consent) {
                localStorage.setItem(KEY, JSON.stringify(consent));
            }
            function hasConsent() {
                const c = getConsent();
                return !!(c && typeof c.analytics === 'boolean' && typeof c.marketing === 'boolean');
            }

            function showBanner() {
                document.getElementById('cookie-banner').style.display = 'block';
            }
            function hideBanner() {
                document.getElementById('cookie-banner').style.display = 'none';
            }

            function applyConsent(consent) {
                // Qui ci metti i loader reali (Google Analytics / Meta Pixel) SOLO se consentito.
                // Esempio: se consent.analytics === true -> carichi GA
                // Esempio: se consent.marketing === true -> carichi Meta Pixel

                // Hook globale utile
                window.OFBOOSTER_COOKIE_CONSENT = consent;
                window.dispatchEvent(new CustomEvent('ofbooster:cookie-consent', { detail: consent }));
            }

            // Elements
            const banner = document.getElementById('cookie-banner');
            const btnAccept = document.getElementById('cookie-accept-all');
            const btnReject = document.getElementById('cookie-reject-all');
            const btnPrefs  = document.getElementById('cookie-open-prefs');
            const btnSave   = document.getElementById('cookie-save-prefs');

            const chkAnalytics = document.getElementById('cookie-analytics');
            const chkMarketing = document.getElementById('cookie-marketing');

            const modalEl = document.getElementById('cookiePrefsModal');
            const modal = modalEl ? new bootstrap.Modal(modalEl) : null;

            // Init
            const existing = getConsent();
            if (!hasConsent()) {
                showBanner();
            } else {
                applyConsent(existing);
            }

            // Open prefs
            btnPrefs?.addEventListener('click', () => {
                const c = getConsent() || { necessary:true, analytics:false, marketing:false };
                chkAnalytics.checked = !!c.analytics;
                chkMarketing.checked = !!c.marketing;
                modal?.show();
            });

            // Accept all
            btnAccept?.addEventListener('click', () => {
                const consent = { necessary:true, analytics:true, marketing:true, ts: Date.now() };
                setConsent(consent);
                applyConsent(consent);
                hideBanner();
            });

            // Reject all (tranne tecnici)
            btnReject?.addEventListener('click', () => {
                const consent = { necessary:true, analytics:false, marketing:false, ts: Date.now() };
                setConsent(consent);
                applyConsent(consent);
                hideBanner();
            });

            // Save prefs
            btnSave?.addEventListener('click', () => {
                const consent = {
                    necessary:true,
                    analytics: !!chkAnalytics.checked,
                    marketing: !!chkMarketing.checked,
                    ts: Date.now()
                };
                setConsent(consent);
                applyConsent(consent);
                hideBanner();
                modal?.hide();
            });

            // Tiny helper: expose a function to reopen banner/prefs from footer
            window.openCookiePreferences = function () {
                btnPrefs?.click();
            };
        })();
        </script>

        <a href="javascript:void(0)" class="text-white text-decoration-underline" onclick="openCookiePreferences()">
            Preferenze cookie
        </a>


    </body>
</html>
