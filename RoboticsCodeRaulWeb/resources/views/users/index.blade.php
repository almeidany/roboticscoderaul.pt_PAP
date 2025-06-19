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
                                    <h4 class="card-title">Lista de Utilizadores</h4>
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-0 text-muted text-center">Nome</th>
                                            <th scope="col" class="px-0 text-muted text-center">Email</th>
                                            <th scope="col" class="px-0 text-muted text-center">Nº de Processo</th>
                                            <th scope="col" class="px-0 text-muted text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-0">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        @if ($user->photo)
                                                            <img src="{{ asset('storage/images/users/' . $user->photo) }}"
                                                                class="rounded-circle" width="35"
                                                                alt="{{ $user->name }}" />
                                                        @else
                                                            <img src="{{ asset('assets/images/profile/user-4.jpg') }}"
                                                                class="rounded-circle" width="35" alt="Default" />
                                                        @endif
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 fw-bold">{{ $user->first_name }}
                                                                {{ $user->last_name }}</h6>
                                                            <small
                                                                class="text-muted">{{ \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-0">{{ $user->email }}</td>
                                                <td class="px-0">
                                                    <small class="text-muted">{{ $user->schoolnumber }}</small>
                                                </td>
                                                <td class="px-0">
                                                    <form id="deleteUser{{ $user->id }}"
                                                        action="{{ route('users.destroy', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Tem certeza que deseja excluir este utilizador?')">
                                                            <i class="bi bi-person-x"></i>
                                                        </button>
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-warning">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('users.show', $user->id) }}"
                                                            class="btn btn-info">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                    </form>
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
