<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.news.head')

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

                    <form action="{{ route('sponsers.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header text-bg-primary">
                                <h4 class="mb-0 text-white text-center">Adicionar Patrocionador</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Carregar Fotografia</label>
                                            <input class="form-control @error('photo') is-invalid @enderror"
                                                type="file" id="formFile" name="photo">
                                            @if (isset($sponsers) && $sponsers->photo)
                                                <img src="{{ asset('storage/images/sponsers/' . $sponsers->photo) }}"
                                                    width="100" class="mt-2">
                                            @endif
                                            @error('photo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Empresa</label>
                                            <input type="text" name="enterprise_name"
                                                class="form-control @error('enterprise_name') is-invalid @enderror"
                                                value="{{ old('enterprise_name') }}">
                                            @error('enterprise_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <label class="form-label">Descrição</label>
                                    <textarea id="summernote" name="designation" class="form-control @error('designation') is-invalid @enderror">{{ old('designation') }}</textarea>
                                    @error('designation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <div class="row pt-3 justify-content-center" style="text-align: center;">
                                        <div class="col-md-4 d-flex flex-column align-items-center">
                                            <div class="mb-3 w-100">
                                                <label class="form-label">Link</label>
                                                <div class="form-group w-100">
                                                    <input type="text" name="link"
                                                        class="form-control @error('link') is-invalid @enderror"
                                                        style="width: 100%; text-align: center;"
                                                        value="{{ old('link') }}">
                                                    @error('link')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-center mt-2" style="margin-bottom: 50px;">
                                        <button type="submit" class="btn btn-primary">Adicionar Patrocinador</button>
                                        <a href="{{ route('sponsers') }}" class="btn btn-danger ms-2">Cancelar</a>
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

    <!-- Depois Summernote -->
    <script src="{{ asset('assets/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/js/summenote/summernote-pt-PT.min.js') }}"></script>
    <script src="{{ asset('assets/js/summenote/summernote-ext-databasic.min.js') }}"></script>
    <script src="{{ asset('assets/js/summenote/summernote-ext-hello.min.js') }}"></script>
    <script src="{{ asset('assets/js/summenote/summernote-ext-specialchars.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Escreva a sua notícia...',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                lang: 'pt-PT'
            });
        });
    </script>
</body>

</html>
