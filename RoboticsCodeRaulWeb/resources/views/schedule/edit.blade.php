<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.schedule.head')

<body>
    <div id="main-wrapper">
        @include('layouts.backoffice.sidebar')
        <div class="page-wrapper">
            <!-- Header Start -->
            <header class="topbar">
                <div class="with-vertical">
                    @include('layouts.backoffice.nav')
                </div>
            </header>
            <!-- Header End -->

            <div class="body-wrapper">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header text-bg-primary">
                            <h4 class="mb-0 text-white text-center">Selecionar Horário</h4>
                        </div>

                        <div class="card-body">
                            <form id="schedule-form" class="max-w-3xl mx-auto p-6" action=""
                                enctype="multipart/form-data" method="GET"
                                style="align-items: center; justify-content: center; text-align: center;">
                                @csrf
                                @if (isset($schedule) && $schedule)
                                    <div class="mb-4">
                                        <p class="text-danger font-semibold">
                                            Já existe um horário definido. Para criar um novo, é necessário apagar o
                                            horário atual.
                                        </p>
                                        <form action="{{ route('schedule.destroy, ') }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Apagar Horário Atual
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <!-- Passo 1: Selecionar dias -->
                                    <div id="step1">
                                        <p class="mb-2 font-semibold">1. Selecione os dias da semana:</p>
                                        <div class="flex gap-4 mb-4">
                                            <button type="button" class="day-btn px-4 py-2 rounded border"
                                                data-day="Segunda">Seg</button>
                                            <button type="button" class="day-btn px-4 py-2 rounded border"
                                                data-day="Terça">Ter</button>
                                            <button type="button" class="day-btn px-4 py-2 rounded border"
                                                data-day="Quarta">Qua</button>
                                            <button type="button" class="day-btn px-4 py-2 rounded border"
                                                data-day="Quinta">Qui</button>
                                            <button type="button" class="day-btn px-4 py-2 rounded border"
                                                data-day="Sexta">Sex</button>
                                        </div>
                                        <button type="button" id="nextToStep2"
                                            class="px-4 py-2 bg-blue-500 text-white rounded hidden">Seguinte</button>
                                    </div>

                                    <!-- Passo 2: Selecionar horários clicáveis -->
                                    <div id="step2" class="hidden">
                                        <p class="font-semibold mb-4">2. Selecione o horário de início e fim para <span
                                                id="currentDayLabel" class="font-bold"></span>:</p>
                                        <div id="gridContainer"
                                            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 mb-4"></div>
                                        <button type="button" id="nextDayBtn"
                                            class="px-4 py-2 bg-blue-500 text-white rounded">Seguinte</button>
                                    </div>

                                    <!-- Passo 3: Resumo -->
                                    <div id="step3" class="hidden">
                                        <p class="font-semibold mb-4">3. Confirme os horários selecionados:</p>
                                        <ul id="summaryList" class="mb-4 list-disc list-inside"></ul>
                                        <button type="submit" id="applyBtn"
                                            class="px-4 py-2 bg-green-600 text-white rounded">Aplicar</button>
                                    </div>
                                @endif
                            </form>
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
    <script src="{{ asset('assets/js/schedule.js') }}"></script>
</body>

</html>
