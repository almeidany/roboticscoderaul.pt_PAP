<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.palmares.head')

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
                            <h4 class="mb-0 text-white text-center">Criar Projeto</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('palmares.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row pt-3">
                                    <!-- Ano (Select2) -->
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Ano</label>
                                            <select name="year"
                                                class="form-select select2 @error('year') is-invalid @enderror"
                                                required>
                                                <option value="">Selecione o ano</option>
                                                @for ($i = now()->year; $i >= 2000; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ old('year') == $i ? 'selected' : '' }}>{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('year')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Nome do Concurso (Select2) -->
                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <label class="form-label">Nome do Concurso</label>
                                            <select name="contest_name"
                                                class="form-select select2 @error('contest_name') is-invalid @enderror"
                                                required>
                                                <option value="">Selecione o concurso</option>
                                                @foreach ($contests as $contest)
                                                    <option value="{{ $contest->name }}"
                                                        {{ old('contest_name') == $contest->name ? 'selected' : '' }}>
                                                        {{ $contest->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('contest_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Fases</label>
                                        <div id="fases-container">
                                            <div class="row align-items-end fase-group mb-2">
                                                <div class="col-md-4">
                                                    <input type="text" name="phase_name[]" class="form-control"
                                                        placeholder="Nome da Fase" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="team_name[]" class="form-control"
                                                        placeholder="Nome da Equipa" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="place[]" class="form-control"
                                                        placeholder="Colocação" required>
                                                </div>
                                                <div class="col-md-1 text-end">
                                                    <button type="button" class="btn btn-add btn-sm"
                                                        onclick="adicionarFase()">＋</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botões -->
                                    <div class="form-actions text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Adicionar Concurso</button>
                                        <a href="{{ route('palmares') }}" class="btn btn-danger ms-2">Cancelar</a>
                                    </div>
                                </div>
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
    <script src="{{ asset('/assets/libs/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2_config.js') }}"></script>
    <script src="{{ asset('/assets/js/row_palmares.js') }}"></script>
</body>

</html>
