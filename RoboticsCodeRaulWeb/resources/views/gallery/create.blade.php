<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.gallery.head')

<body>
    <div id="main-wrapper">
        @include('layouts.backoffice.sidebar')
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical">
                    @include('layouts.backoffice.nav')
                </div>
            </header>
            <!--  Header End -->
            <div class="body-wrapper">
                <div class="container-fluid">

                    <form action="{{ route('gallery.store') }}" enctype="multipart/form-data" method="POST"
                        style="align-items: center; margin: 0 auto; justify-content: center; width: 80%;">
                        @csrf
                        <div class="card">
                            <div class="card-header text-bg-primary">
                                <h4 class="mb-0 text-white text-center">Adicionar Fotografia</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Carregar Fotografia</label>
                                            <input class="form-control @error('photo') is-invalid @enderror"
                                                type="file" id="formFile" name="photo">
                                            @error('photo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            @if (isset($photo) && $photo->photo)
                                                <img src="{{ asset('storage/images/gallery/' . $photo->photo) }}"
                                                    width="100" class="mt-2">
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Título</label>
                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Concurso</label>
                                                <select
                                                    class="select2 form-control @error('palmares') is-invalid @enderror"
                                                    id="palmares" name="palmares">
                                                    <option value="" disabled selected>Selecione o concurso
                                                        correspondente</option>
                                                    @foreach ($palmares as $contest)
                                                        <option value="{{ $contest->name }}"
                                                            {{ old('palmares') == $contest->name ? 'selected' : '' }}>
                                                            {{ $contest->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('palmares')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Ano</label>
                                                <select class="select2 form-control @error('year') is-invalid @enderror"
                                                    id="year" name="year">
                                                    <option value="" disabled selected>Selecione o ano</option>
                                                    @for ($year = 2022; $year <= 2200; $year++)
                                                        <option value="{{ $year }}"
                                                            {{ old('year') == $year ? 'selected' : '' }}>
                                                            {{ $year }}</option>
                                                    @endfor
                                                </select>
                                                @error('year')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions text-center mt-2" style="margin-bottom: 50px;">
                                        <button type="submit" class="btn btn-primary">Adicionar Fotografia</button>
                                        <a href="{{ route('gallery') }}" class="btn btn-danger ms-2">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            @include('layouts.backoffice.Settings_Script')
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
    <!-- jQuery primeiro -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2_config.js') }}"></script>
</body>

</html>
