<!DOCTYPE html>
<html lang="en">

@include('layouts.frontoffice.head_news')

<body>
    @include('layouts.frontoffice.nav')

    <!-- Case Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Notícias</div>
                <h2 class="mb-4">Fique a par do acontecimento</h2>
            </div>
            <div class="row g-4">
                @foreach ($news as $item)
                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                        <div class="case-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid"
                                src="{{ $item->photo ? asset('storage/images/news/' . $item->photo) : '' }}"
                                alt="Imagem da notícia">
                            <a class="case-overlay text-decoration-none"
                                href="{{ route('news.front.show', $item->id) }}">
                                <h6 class="lh-base text-white mb-2" style="font-size: 16px;">
                                    {{ Str::limit($item->title, 60) }}
                                </h6>
                                <p class="text-white" style="font-size: 14px;">
                                    {{ Str::limit(strip_tags($item->news), 80) }}
                                </p>
                                <span class="btn btn-square btn-primary mt-2"><i class="fa fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Paginação --}}
            <div class="fixed-pagination d-flex justify-content-center">
                {{ $news->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    @include('layouts.frontoffice.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
