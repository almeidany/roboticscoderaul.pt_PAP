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
                            <h4 class="mb-0 text-white text-center">Editar Projeto</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nome do Projeto</label>
                                            <input type="text" name="projectname"
                                                class="form-control @error('projectname') is-invalid @enderror"
                                                value="{{ old('projectname', $project->projectname) }}" required>
                                            @error('projectname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Designação</label>
                                            <input type="text" name="designation"
                                                class="form-control @error('designation') is-invalid @enderror"
                                                value="{{ old('designation', $project->designation) }}" required>
                                            @error('designation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Categoria</label>
                                            <select class="form-select @error('category') is-invalid @enderror"
                                                name="category" required>
                                                <option value="" disabled>Selecione uma categoria</option>
                                                @foreach ($categories as $index => $value)
                                                    <option value="{{ $index }}" @selected(old('category', $project->category) == $index)>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Data de Início</label>
                                            <input type="date" name="start_date"
                                                class="form-control @error('start_date') is-invalid @enderror"
                                                value="{{ old('start_date', $project->start_date) }}" required>
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Data de Conclusão</label>
                                            <input type="date" name="end_date"
                                                class="form-control @error('end_date') is-invalid @enderror"
                                                value="{{ old('end_date', $project->end_date) }}">
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Github</label>
                                            <input type="url" name="github_url"
                                                class="form-control @error('github_url') is-invalid @enderror"
                                                placeholder="https://github.com/utilizador/projeto"
                                                value="{{ old('github_url', $project->github_url) }}"
                                                pattern="https:\/\/github\.com\/.+" required>
                                            @error('github_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Foto</label>
                                            <input class="form-control @error('photo') is-invalid @enderror"
                                                type="file" name="photo" id="formFile">
                                            @error('photo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Membros do Projeto</label>
                                            <select
                                                class="select2 form-control @error('projectcolleagues') is-invalid @enderror"
                                                id="projectcolleagues" name="projectcolleagues[]" multiple="multiple">
                                                <option disabled>Selecione o colega de trabalho</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        @if (collect(old('projectcolleagues', $project->users->pluck('id')->toArray()))->contains($user->id)) selected @endif>
                                                        {{ $user->first_name }} {{ $user->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('projectcolleagues')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Descrição</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                    <a href="{{ route('projects') }}" class="btn btn-danger ms-2">Cancelar</a>
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
