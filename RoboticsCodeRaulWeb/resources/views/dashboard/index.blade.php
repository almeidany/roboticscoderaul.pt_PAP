<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.head')

<body>
    <div id="main-wrapper">
        @include('layouts.backoffice.sidebar')
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical"><!-- ---------------------------------- -->
                    <!-- Start Vertical Layout Header -->
                    <!-- ---------------------------------- -->
                    @include('layouts.backoffice.nav')
                    <div class="body-wrapper">
                        <div class="container-fluid">
                            <!--  Owl carousel -->
                            <div class="owl-carousel counter-carousel owl-theme">
                                <div class="item">
                                    <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="{{ asset('assets/images/svgs/icon-user-male.svg') }}"
                                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                                <p class="fw-semibold fs-3 text-primary mb-1">
                                                    Presenças
                                                </p>
                                                <h5 class="fw-semibold text-primary mb-0">{{ $attendancesCount ?? 0 }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="{{ asset('assets/images/svgs/icon-briefcase.svg') }}"
                                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                                <p class="fw-semibold fs-3 text-warning mb-1">Membros</p>
                                                <h5 class="fw-semibold text-warning mb-0">{{ $usersCount ?? 0 }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="{{ asset('assets/images/svgs/icon-mailbox.svg') }}"
                                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                                <p class="fw-semibold fs-3 text-info mb-1">Projetos</p>
                                                <h5 class="fw-semibold text-info mb-0">{{ $projectsCount ?? 0 }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="{{ asset('assets/images/svgs/icon-favorites.svg') }}"
                                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                                <p class="fw-semibold fs-3 text-danger mb-1">Noticias</p>
                                                <h5 class="fw-semibold text-danger mb-0">{{ $newsCount ?? 0 }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card border-0 zoom-in bg-success-subtle shadow-none">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="{{ asset('assets/images/svgs/icon-speech-bubble.svg') }}"
                                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                                <p class="fw-semibold fs-3 text-success mb-1">Patrocinadores</p>
                                                <h5 class="fw-semibold text-success mb-0">{{ $sponsersCount ?? 0 }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="{{ asset('assets/images/svgs/icon-connect.svg') }}"
                                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                                <p class="fw-semibold fs-3 text-info mb-1">Turmas</p>
                                                <h5 class="fw-semibold text-info mb-0">{{ $classesCount ?? 0 }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  Row 1 -->
                            <div class="row">
                                <div class="col-lg-8 d-flex align-items-stretch">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <div
                                                class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                                <div class="mb-3 mb-sm-0">
                                                    <h4 class="card-title fw-semibold">Revenue Updates</h4>
                                                    <p class="card-subtitle mb-0">Overview of Profit</p>
                                                </div>
                                                <select class="form-select w-auto">
                                                    <option value="1">March 2024</option>
                                                    <option value="2">April 2024</option>
                                                    <option value="3">May 2024</option>
                                                    <option value="4">June 2024</option>
                                                </select>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <div id="chart" class="mx-n6"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="hstack mb-4 pb-1">
                                                        <div
                                                            class="p-8 bg-primary-subtle rounded-1 me-3 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-grid-dots text-primary fs-6"></i>
                                                        </div>
                                                        <div>
                                                            <h4 class="mb-0 fs-7 fw-semibold">$63,489.50</h4>
                                                            <p class="fs-3 mb-0">Total Earnings</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="d-flex align-items-baseline mb-4">
                                                            <span
                                                                class="round-8 text-bg-primary rounded-circle me-6"></span>
                                                            <div>
                                                                <p class="fs-3 mb-1">Earnings this month</p>
                                                                <h6 class="fs-5 fw-semibold mb-0">$48,820</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-baseline mb-4 pb-1">
                                                            <span
                                                                class="round-8 text-bg-secondary rounded-circle me-6"></span>
                                                            <div>
                                                                <p class="fs-3 mb-1">Expense this month</p>
                                                                <h6 class="fs-5 fw-semibold mb-0">$26,498</h6>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-primary w-100">
                                                                View Full Report
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-flex align-items-stretch flex-column">
                                    <!-- Yearly Breakup -->
                                    <div class="card w-100 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title fw-semibold mb-3">Últimos Utilizadores Criados
                                            </h5>
                                            <div class="d-flex flex-wrap gap-3">
                                                @forelse ($latestUsers as $user)
                                                    <div class="p-2 border rounded-3 bg-light shadow-sm">
                                                        <h6 class="mb-0">
                                                            {{ $user->first_name }} {{ $user->last_name }}
                                                        </h6>
                                                        <small class="text-muted">
                                                            Entrou há
                                                            {{ $user->created_at->diffForHumans(null, false, false, 2) }}
                                                        </small>
                                                    </div>
                                                @empty
                                                    <p class="text-muted">Nenhum utilizador recente</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Monthly Earnings -->
                                    <div class="card w-100 shadow-sm rounded">
                                        <div class="card-body">
                                            <div class="row align-items-start">
                                                <div class="col-12">
                                                    <h5 class="card-title mb-2 text-muted">Rifas Vendidas</h5>
                                                    <h2 class="fw-bold mb-3 text-primary">
                                                        € {{ number_format($rafflesSum, 2, ',', '.') }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dark-transparent sidebartoggler"></div>
                <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
                <!-- Import Js Files -->
                <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
                <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
                <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
                <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
                <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
                <script src="{{ asset('assets/js/theme/sidebarmenu.js') }}"></script>

                <!-- highlight.js (code view) -->
                <script src="{{ asset('assets/js/highlights/highlight.min.js') }}"></script>
                <script>
                    hljs.initHighlightingOnLoad();

                    document.querySelectorAll("pre.code-view > code").forEach((codeBlock) => {
                        codeBlock.textContent = codeBlock.innerHTML;
                    });
                </script>
                <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
                <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
                <script src="{{ asset('assets/js/dashboards/dashboard.js') }}"></script>
</body>

</html>
