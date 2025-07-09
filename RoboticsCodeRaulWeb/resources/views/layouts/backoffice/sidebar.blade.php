<aside class="left-sidebar with-vertical">
    <div>
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/img/logo.png') }}" class="dark-logo d-block" alt="Logo-Dark"
                    style="max-width: 150px; margin auto;">
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="bi bi-x"></i>
            </a>
        </div>

        <!-- Sidebar Start -->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-pin-angle"></i>
                        </span>
                        <span class="hide-menu">Página Inicial</span>
                    </a>
                    <a class="sidebar-link" href="{{ route('attendance') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-clock"></i>
                        </span>
                        <span class="hide-menu">Marcar Presença</span>
                    </a>
                    <a class="sidebar-link" href="{{ route('users') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-people"></i>
                        </span>
                        <span class="hide-menu">Membros</span>
                    </a>
                    <a class="sidebar-link" href="{{ route('projects') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-box-seam"></i>
                        </span>
                        <span class="hide-menu">Projetos</span>
                    </a>
                    <a class="sidebar-link" href="{{ route('news') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-newspaper"></i>
                        </span>
                        <span class="hide-menu">Noticias</span>
                    </a>
                    <a class="sidebar-link" href="{{ route('palmares') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-award"></i>
                        </span>
                        <span class="hide-menu">Palmares</span>
                    </a>
                    <a class="sidebar-link" href="{{ route('sponsers') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-rocket-takeoff"></i>
                        </span>
                        <span class="hide-menu">Patrocinadores</span>
                    </a>
                    <a class="sidebar-link" href="{{ route('contests') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-book"></i>
                        </span>
                        <span class="hide-menu">Concursos</span>
                    </a>
                    {{-- <a class="sidebar-link" href="{{ route('gallery') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-archive"></i>
                        </span>
                        <span class="hide-menu">Galeria</span>
                    </a> --}}

                    <a class="sidebar-link" href="{{ route('raffles') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-card-text"></i>
                        </span>
                        <span class="hide-menu">Rifas</span>
                    </a>
                    <a class="sidebar-link" href="{{ route('classes') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="bi bi-person-video3"></i>
                        </span>
                        <span class="hide-menu">Turmas</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
