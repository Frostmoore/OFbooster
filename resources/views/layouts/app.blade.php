<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - OFBooster</title>

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
</body>
</html>
