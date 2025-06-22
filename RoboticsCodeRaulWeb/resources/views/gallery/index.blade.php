<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.news.head_index')

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
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <button
                    class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center position-fixed bottom-0 end-0 m-3"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                    aria-controls="offcanvasExample" onclick="window.location.href='{{ route('gallery.create') }}'">
                    <i class="bi bi-file-earmark-arrow-up fs-7"></i>
                </button>
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
        <script src="{{ asset('assets/js/load_imgModal.js') }}"></script>
</body>

</html>
