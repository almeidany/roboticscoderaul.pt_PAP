<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.projects.head')

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
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header text-bg-primary">
                            <h4 class="mb-0 text-white text-center">Perfil do Projeto</h4>
                        </div>

                        <div class="card-body" style="align-content: center; text-align: left;">
                            <form action="{{ route('projects.show', $project->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nome do Projeto</label>
                                            <div class="form-control-plaintext">{{ $project->projectname }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-between">
                                        <div>
                                            <label class="form-label">Designação</label>
                                            <div class="form-control-plaintext">{{ $project->designation }}</div>
                                        </div>

                                        {{-- Imagem do projeto à direita --}}
                                        @if ($project->photo)
                                            <div style="margin-left: auto;">
                                                <img src="{{ asset('storage/images/projects/' . $project->photo) }}"
                                                    alt="Imagem do Projeto" width="150" height="150"
                                                    style="border-radius: 10px; object-fit: cover; border: 1px solid #ccc; margin-left: 20px; margin-top: 10px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Categoria</label>
                                            <div class="form-control-plaintext">{{ $project->category }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Data de Início</label>
                                            <div class="form-control-plaintext">{{ $project->start_date }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Data de Conclusão</label>
                                            <div class="form-control-plaintext">{{ $project->end_date }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Github</label>
                                            <div class="form-control-plaintext">{{ $project->github_url }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Foto</label>
                                            <div class="form-control-plaintext">
                                                {{ $project->photo ? basename($project->photo) : 'Nenhum ficheiro selecionado' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Membros do Projeto</label>
                                            <div class="form-control-plaintext">
                                                @if ($project->users->isEmpty())
                                                    Nenhum membro atribuído
                                                @else
                                                    {{ $project->users->pluck('first_name')->zip($project->users->pluck('last_name'))->map(function ($names) {
                                                            return $names[0] . ' ' . $names[1];
                                                        })->join(', ') }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Descrição</label>
                                            <div class="form-control-plaintext">{{ $project->description }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions text-center mt-4">
                                    <a href="{{ route('projects') }}" class="btn btn-danger ms-2">Voltar a Projetos</a>
                                </div>
                            </form>
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
    <script src="{{ asset('/assets/libs/select2/dist//js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2_config.js') }}"></script>
</body>

</html>
