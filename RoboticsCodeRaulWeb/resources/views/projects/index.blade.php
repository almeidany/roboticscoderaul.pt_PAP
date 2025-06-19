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
                                    <h4 class="card-title">Lista de Projetos</h4>
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-0 text-muted text-center">Nome</th>
                                            <th scope="col" class="px-0 text-muted text-center">Categoria</th>
                                            <th scope="col" class="px-0 text-muted text-center">Github</th>
                                            <th scope="col" class="px-0 text-muted text-center">Estado</th>
                                            <th scope="col" class="px-0 text-muted text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td class="px-0">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        @if ($project->photo)
                                                            <!-- Verifique se o campo se chama 'photo' ou 'foto' -->
                                                            <img src="{{ asset('storage/images/projects/' . $project->photo) }}"
                                                                class="rounded-circle" width="35"
                                                                alt="{{ $project->projectname }}" />
                                                        @else
                                                            <img src="{{ asset('assets/images/profile/user-4.jpg') }}"
                                                                class="rounded-circle" width="35" alt="Default" />
                                                        @endif
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 fw-bold">{{ $project->projectname }}</h6>
                                                            <small
                                                                class="text-muted">{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-0">{{ $project->category }}</td>
                                                <!-- Exibe a categoria como sigla -->
                                                <td class="px-0">
                                                    <a href="{{ $project->github_url }}" target="_blank"
                                                        class="text-primary text-decoration-underline">
                                                        {{ $project->github_url }}
                                                    </a>
                                                </td>
                                                <td class="px-0 text-dark font-weight-medium">
                                                    @if ($project->end_date)
                                                        <span class="badge bg-success">Concluído</span>
                                                        <small
                                                            class="text-muted d-block">{{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</small>
                                                    @else
                                                        <span class="badge bg-warning">Em Progresso</span>
                                                    @endif
                                                </td>
                                                <td class="px-0">
                                                    <form id="deleteProject{{ $project->id }}"
                                                        action="{{ route('projects.destroy', $project->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Tem certeza que deseja excluir este projeto?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                        <a href="{{ route('projects.edit', $project->id) }}"
                                                            class="btn btn-warning">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('projects.show', $project->id) }}"
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
            <button
                class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center position-fixed bottom-0 end-0 m-3"
                type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample" onclick="window.location.href='{{ route('projects.create') }}'">
                <i class="bi bi-database-add fs-7"></i>
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
