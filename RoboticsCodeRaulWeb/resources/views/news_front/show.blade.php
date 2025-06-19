<!DOCTYPE html>
<html lang="en">

@include('layouts.frontoffice.head_news')

<body>
    <header>
        @include('layouts.frontoffice.nav')
    </header>

    <main>
        <div class="container-fluid bg-light py-5">
            <div class="container py-5">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h1 class="mb-4">{{ $news->title }}</h1>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="bg-white p-4 rounded shadow-sm">
                            <div class="mb-4" style="text-align: justify; font-size: 1rem; line-height: 1.6;">
                                {!! $news->news !!}
                            </div>

                            <div class="d-flex justify-content-between flex-wrap mb-4">
                                <small><strong>Publicado por:</strong> {{ $news->author_user }}</small>
                                <small><strong>Publicado em:</strong>
                                    {{ \Carbon\Carbon::parse($news->news_date)->format('d/m/Y') }}</small>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('news.front') }}" class="btn btn-danger">Voltar a Notícias</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        @include('layouts.frontoffice.footer')
    </footer>

    <!-- Botão voltar ao topo -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/js/summenote/summernote-pt-PT.min.js') }}"></script>
    <script src="{{ asset('assets/js/summenote/summernote-ext-databasic.min.js') }}"></script>
    <script src="{{ asset('assets/js/summenote/summernote-ext-hello.min.js') }}"></script>
    <script src="{{ asset('assets/js/summenote/summernote-ext-specialchars.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
