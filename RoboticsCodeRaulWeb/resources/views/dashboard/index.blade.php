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
                                            <h4 class="fw-bold mb-4">Quantidade de alunos por turma</h4>
                                            <canvas id="classChart" style="max-height: 300px;"></canvas>
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
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const labels = {!! $classesCount_donut->pluck('class') !!};
                        const data = {!! $classesCount_donut->pluck('total') !!};

                        const ctx = document.getElementById('classChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labels,
                                datasets: [{
                                    data: data,
                                    backgroundColor: [
                                        '#36A2EB', '#4BC0C0', '#FFCE56', '#FF6384', '#9966FF',
                                        '#00A36C', '#FF8C00', '#8B0000', '#20B2AA', '#A52A2A'
                                    ],
                                    borderWidth: 1,
                                }]
                            },
                            options: {
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                const nomeTurma = context.label;
                                                const quantidade = context.raw;
                                                return `${quantidade} alunos - ${nomeTurma}`;
                                            }
                                        }
                                    }
                                },
                                cutout: '60%',
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });
                    });
                </script>
</body>

</html>
