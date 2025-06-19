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
                                <table id="zero_config" class="table table-striped table-bordered text-center">
                                    <h4 class="card-title">Rifas | Consulta</h4>
                                    <thead>
                                        <tr>
                                            <th class="px-0 text-muted text-center">Nome</th>
                                            <th class="px-0 text-muted text-center">Turma</th>
                                            <th class="px-0 text-muted text-center">Rifas Atribuídas</th>
                                            <th class="px-0 text-muted text-center">Total Vendido</th>
                                            <th class="px-0 text-muted text-center">Angariado</th>
                                            <th class="px-0 text-muted text-center">Rifas Por Devolver</th>
                                        </tr>
                                    </thead>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-0 text-center">
                                                <strong>{{ $user->first_name }}
                                                    {{ $user->last_name }}</strong>
                                            </td>
                                            <td class="px-0 text-center">
                                                {{ $user->class }}
                                            </td>
                                            <td class="px-0 text-center">
                                                <form method="POST"
                                                    action="{{ route('users.updateRaffles', $user->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="number" name="raffles_given"
                                                        value="{{ $user->raffles_given }}" class="form-control"
                                                        style="width: 80px; margin: 0 auto; text-align: center;"
                                                        onchange="this.form.submit()">
                                                </form>
                                            </td>
                                            <td class="px-0 text-center">
                                                <form method="POST"
                                                    action="{{ route('users.updateRaffles', $user->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="number" name="raffles_sold"
                                                        value="{{ $user->raffles_sold }}" class="form-control"
                                                        style="width: 80px; margin: 0 auto; text-align: center;"
                                                        onchange="this.form.submit()">
                                                </form>
                                            </td>
                                            <td class="px-0 text-center">
                                                {{ $user->total_sold_byuser }} €
                                            </td>
                                            <td class="px-0 text-center">
                                                {{ $user->raffles_toReturn }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-basic.init.js') }}"></script>
</body>

</html>
