<!DOCTYPE html>
<html lang="pt-PT">

@include('layouts.frontoffice.head_gallery')

<body>
    @include('layouts.frontoffice.nav')

    <!-- Hero Start (corrigido para ficar igual ao index) -->
    <div class="container-fluid pt-5 bg-primary hero-header mb-5">
        <div class="container pt-5">
            <div class="row g-5 pt-5 justify-content-center">
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

    @include('layouts.frontoffice.footer')

    @include('layouts.frontoffice.cookies')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>

    @include('layouts.frontoffice.scripts_gallery')
</body>

</html>
