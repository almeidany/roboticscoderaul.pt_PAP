<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.projects.head')

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
                <div class="datatables text-center">
                    <div class="card">
                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <h4 class="card-title">Lista de Presenças</h4>
                                <table id="attendances_table" class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nome</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Data/Hora</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($attendances as $attendance)
                                            <tr>
                                                <td>
                                                    {{-- <div class="d-flex align-items-center">
                                                    <img src="{{ asset($attendance->user ? 'storage/images/profiles/'.$attendance->user->photo : 'assets/images/profile/user-4.jpg') }}"
                                                         class="rounded-circle me-2"
                                                         width="40"
                                                         height="40"
                                                         alt="{{ $attendance->user->name ?? 'Utilizador' }}"/>
                                                    <div> --}}
                                                    <h6 class="mb-0 fw-bold">
                                                        {{ $attendance->user->first_name . ' ' . $attendance->user->last_name }}
                                                    </h6>
                                                    <small
                                                        class="text-muted">{{ $attendance->user->email ?? '' }}</small>
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="badge bg-success">Presente</span>
                        </td>
                        <td>
                            {{ $attendance->attendance_date ? \Carbon\Carbon::parse($attendance->attendance_date)->format('d/m/Y H:i') : '' }}
                        </td>
                        <td class="px-0">
                            <form id="deleteAttendance{{ $attendance->id }}"
                                action="{{ route('attendance.destroy', $attendance->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja excluir esta presença?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Nenhuma presença registrada</td>
                        </tr>
                        @endforelse
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Div para o botão no canto inferior esquerdo -->
    <button
        class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center position-fixed bottom-0 end-0 m-3"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"
        onclick="window.location.href='{{ route('attendance.create') }}'">
        <i class="bi bi-clock fs-7"></i>
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
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-basic.init.js') }}"></script>
</body>

</html>
