<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.projects.head')

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
                            <h4 class="mb-0 text-white text-center">Detalhes da fotografia</h4>
                        </div>

                        <div class="card-body" style="align-content: center; text-align: left;">
                            <form action="{{ route('gallery.show', $photo->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Título</label>
                                                <div class="form-control-plaintext">{{ $photo->title }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Concurso</label>
                                                <div class="form-control-plaintext">
                                                    {{ $photo->contest ? $photo->contest->name : 'Sem concurso' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Ano</label>
                                                <div class="form-control-plaintext">{{ $photo->year }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nome do Ficheiro</label>
                                                <div class="form-control-plaintext">
                                                    {{ $photo->photo ? basename($photo->photo) : 'Sem ficheiro' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($photo->photo)
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <img src="{{ asset('storage/images/gallery/' . $photo->photo) }}"
                                                    alt="Foto" class="img-thumbnail mt-3"
                                                    style="max-width: 400px; border-radius: 10px;">
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-actions text-center mt-4">
                                    <a href="{{ route('projects') }}" class="btn btn-danger ms-2">Voltar a galeria</a>
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
    <script src="{{ asset('/assets/libs/select2/dist//js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2_config.js') }}"></script>
</body>

</html>
