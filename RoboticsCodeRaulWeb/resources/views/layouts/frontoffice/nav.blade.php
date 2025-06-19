<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #1363C6;">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- Botão Hamburger (esquerda) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Logo centrado -->
        <a class="navbar-brand mx-auto fw-bold text-white" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="height: 75px; margin-top: -14px;">
        </a>

        <!-- Menu para desktop e mobile -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="{{ route('home') }}" class="nav-item nav-link">Página Inicial</a>
                <a href="{{ route('contest') }}" class="nav-item nav-link">Concursos</a>
                <a href="{{ route('gallery') }}" class="nav-item nav-link">Galeria</a>
                <a href="{{ route('news.front') }}" class="nav-item nav-link">Notícias</a>
                <a href="{{ route('sponsers.front') }}" class="nav-item nav-link">Patrocionadores</a>
                <a href="{{ route('about_us') }}" class="nav-item nav-link">Sobre Nós</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
