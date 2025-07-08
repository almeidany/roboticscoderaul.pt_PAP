<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.classes.head')

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
                            <h4 class="mb-0 text-white text-center">Adicionar Turma</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('classes.store') }}" enctype="multipart/form-data" method="POST"
                                class="d-flex flex-column align-items-center w-100">
                                @csrf
                                <div class="row pt-3 w-100 justify-content-center">
                                    <!-- Ano (Select2) -->
                                    <div class="col-md-3 d-flex flex-column align-items-center">
                                        <div class="mb-3 w-100">
                                            <label class="form-label w-100 text-center">Ano Escolar</label>
                                            <select name="class_year"
                                                class="form-select select2 @error('class_year') is-invalid @enderror text-center"
                                                required>
                                                <option value="">Selecione o ano</option>
                                                @for ($i = 12; $i >= 1; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ old('class_year') == $i ? 'selected' : '' }}>
                                                        {{ $i }}</option>
                                                @endfor
                                            </select>
                                            @error('class_year')
                                                <div class="invalid-feedback text-center">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Container das turmas -->
                                    <div class="col-12 d-flex flex-column align-items-center">
                                        <label class="form-label w-100 text-center">Turmas</label>
                                        <div id="turmas-container" class="w-50">
                                            <div class="row align-items-end turma-group mb-2 justify-content-center">
                                                <div class="col-md-6">
                                                    <input type="text" name="class[]"
                                                        class="form-control text-center" placeholder="Letra da Turma"
                                                        required>
                                                </div>
                                                <div class="col-md-2 text-end">
                                                    <button type="button" class="btn btn-add btn-sm"
                                                        onclick="adicionarTurma()">＋</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botões -->
                                    <div class="form-actions text-center mt-4 w-100">
                                        <button type="submit" class="btn btn-primary">Adicionar Turma</button>
                                        <a href="{{ route('classes.create') }}" class="btn btn-danger ms-2">Cancelar</a>
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
    <script src="{{ asset('/assets/js/row_classes.js') }}"></script>
</body>

</html>
