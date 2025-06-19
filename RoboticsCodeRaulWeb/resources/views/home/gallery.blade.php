<!DOCTYPE html>
<html lang="pt-PT">

@include('layouts.frontoffice.head_gallery')

<body>
    @include('layouts.frontoffice.nav')

    <!-- Hero Start (corrigido para ficar igual ao index) -->
    <div class="container-fluid pt-5 bg-primary hero-header mb-5">
        <div class="container pt-5">
            <div class="row g-5 pt-5 justify-content-center">
                <div class="col-12 text-center">
                    <div class="d-flex flex-wrap justify-content-center" id="yearButtons">
                        <!-- Year buttons will be injected here by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Main Content Start (corrigido o layout) -->
    <div class="container py-5">
        <div class="row g-4" id="mainContent">
            <!-- Subtitles and images will be injected here by JavaScript -->
        </div>
    </div>
    <!-- Main Content End -->

    <!-- Album Modal Start -->
    <div id="albumModal" class="modal fade" tabindex="-1" aria-labelledby="albumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="albumModalLabel">Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="carouselInner">
                            <!-- Carousel items will be injected here by JavaScript -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Album Modal End -->

    @include('layouts.frontoffice.footer')

    @include('layouts.frontoffice.cookies')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>

    @include('layouts.frontoffice.scripts_gallery')
</body>

</html>
