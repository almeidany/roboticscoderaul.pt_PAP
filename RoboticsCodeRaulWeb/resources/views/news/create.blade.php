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

                    <form action="{{ route('news.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header text-bg-primary">
                                <h4 class="mb-0 text-white text-center">Publicar Noticia</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Carregar Fotografia</label>
                                            <input class="form-control" type="file" id="formFile" name="photo">
                                            @if (isset($news) && $news->photo)
                                                <img src="{{ asset('storage/images/news/' . $news->photo) }}"
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

                                    <label class="form-label">Notícia</label>
                                    <textarea id="summernote" name="news" class="form-control @error('news') is-invalid @enderror">{{ old('news') }}</textarea>
                                    @error('news')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <div class="row pt-3 justify-content-center" style="text-align: center;">
                                        <div class="col-md-4 d-flex flex-column align-items-center">
                                            <div class="mb-3 w-100">
                                                <label class="form-label">Data da Publicação</label>
                                                <div class="form-group w-100">
                                                    <input type="date" name="news_date" class="form-control"
                                                        style="width: 100%; text-align: center;"
                                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column align-items-center">
                                            <div class="mb-3 w-100">
                                                <label class="form-label">Publicado Por</label>
                                                <div class="form-group w-100">
                                                    <input type="text" name="author_user" class="form-control"
                                                        style="width: 100%; text-align: center;"
                                                        value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions text-center mt-2" style="margin-bottom: 50px;">
                                    <button type="submit" class="btn btn-primary">Publicar Noticia</button>
                                    <a href="{{ route('news') }}" class="btn btn-danger ms-2">Cancelar</a>
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
