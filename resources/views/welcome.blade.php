<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil - Mon Projet</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        header.hero {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            padding: 80px 0;
            color: white;
        }

        .feature-box {
            padding: 25px;
            border-radius: 10px;
            transition: .3s;
            background: #ffffff;
            border: 1px solid #eee;
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

    <!-- ================= NAVBAR (PROPRE + BOOTSTRAP) ================= -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Mon Projet</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Créer un compte</a>
                        </li>
                        @endif
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- ================= HERO SECTION ================= -->
    <header class="hero text-center">
        <div class="container">
            <h1 class="fw-bold">Bienvenue sur Notre Plateforme</h1>
            <p class="mt-3 fs-5">Une solution moderne, rapide et sécurisée pour gérer votre application.</p>
            <a href="#" class="btn btn-light btn-lg mt-4">Commencer</a>
        </div>
    </header>

    <!-- ================= FEATURES ================= -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-semibold">Fonctionnalités</h2>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <h4 class="mb-3">Performances</h4>
                        <p>Une application optimisée avec un temps de réponse excellent.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <h4 class="mb-3">Sécurité</h4>
                        <p>Des normes avancées pour protéger vos données et votre application.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <h4 class="mb-3">Interface moderne</h4>
                        <p>Un design élégant, fluide et facile à utiliser.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="text-center py-3 bg-light">
        <p class="mb-0">© 2025 - Mon Projet | Tous droits réservés</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
