<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.attendance.head')

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
                <div class="center-container">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header text-bg-primary">
                                <h4 class="mb-0 text-white text-center">Marcar Presença</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('attendance.store') }}" method="POST" id="attendanceForm">
                                    @csrf
                                    <div class="mb-3 form-group">
                                        <div class="form-check d-flex justify-content-center align-items-center gap-2">
                                            <input type="checkbox" class="form-check-input" id="attendanceCheckbox"
                                                name="attendance_check" required
                                                @if ($userAlreadyMarked) disabled @endif>

                                            <label class="form-check-label fw-bold" for="attendanceCheckbox">
                                                @if ($userAlreadyMarked)
                                                    Presença já marcada hoje
                                                @else
                                                    Confirmo minha presença
                                                @endif
                                            </label>
                                        </div>
                                        <div id="timeRestrictionMessage" class="text-danger text-center small mt-2">
                                        </div>
                                    </div>
                                    <div class="form-actions text-center mt-4">
                                        <button type="submit" class="btn btn-primary"
                                            @if ($userAlreadyMarked) disabled @endif>
                                            Marcar Presença
                                        </button>
                                        <a href="{{ route('attendance') }}" class="btn btn-danger ms-2">Voltar</a>
                                    </div>
                                </form>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dark-transparent sidebartoggler"></div>
            <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
            <script src="{{ asset('assets/js/attendance.js') }}"></script>
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
</body>

</html>
