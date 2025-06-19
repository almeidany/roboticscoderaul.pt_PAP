<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.news.head')

<body>
    <div id="main-wrapper">
        <div class="page-wrapper">
            @include('layouts.frontoffice.nav')
            <!--  Header End -->
            <div class="body-wrapper">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="card">
                            <!-- Title Header -->
                            <div class="card-header text-bg-primary text-center">
                                <h3 class="text-white mb-0">{{ $news->title }}</h3>
                            </div>

                            <!-- News Content With Scroll -->
                            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                                <div class="news-body" style="font-size: 16px;">
                                    {!! $news->news !!}
                                </div>
                            </div>

                            <!-- Footer with Author and Date -->
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <small><strong>Publicado por:</strong> {{ $news->author_user }}</small>
                                <small><strong>Publicado em:</strong>
                                    {{ \Carbon\Carbon::parse($news->news_date)->format('d/m/Y') }}</small>
                            </div>
                        </div>
                        <div class="form-actions text-center mt-4">
                            <a href="{{ route('news') }}" class="btn btn-danger ms-2">Voltar a
                                Notícias</a>
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
            <!-- jQuery primeiro -->
            <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
            <!-- Depois Summernote -->
            <script src="{{ asset('assets/js/summernote/summernote-lite.min.js') }}"></script>
            <script src="{{ asset('assets/js/summenote/summernote-pt-PT.min.js') }}"></script>
            <script src="{{ asset('assets/js/summenote/summernote-ext-databasic.min.js') }}"></script>
            <script src="{{ asset('assets/js/summenote/summernote-ext-hello.min.js') }}"></script>
            <script src="{{ asset('assets/js/summenote/summernote-ext-specialchars.min.js') }}"></script>
</body>

</html>
