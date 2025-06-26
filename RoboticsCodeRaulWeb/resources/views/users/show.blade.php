<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.head')

<body>
    <div class="main-wrapper">
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
                            <h4 class="mb-0 text-white text-center">Perfil do Membro</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('users.show', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Primeiro Nome <span
                                                    class="text-danger"></span></label>
                                            <div class="form-control-plaintext">{{ $user->first_name }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Último Nome <span
                                                    class="text-danger"></span></label>
                                            <div class="form-control-plaintext">{{ $user->last_name }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número de Processo <span
                                                    class="text-danger"></span></label>
                                            <div class="form-control-plaintext">{{ $user->schoolnumber }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Data de Nascimento <span
                                                    class="text-danger"></span></label>
                                            <div class="form-control-plaintext">{{ $user->birth_date }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-danger"></span></label>
                                            <div class="form-control-plaintext">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número de Telefone <span
                                                    class="text-danger"></span></label>
                                            <div class="form-control-plaintext">{{ $user->phonenumber }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Turma <span class="text-danger"></span></label>
                                            <div class="form-control-plaintext">{{ $user->class }}</div>
                                        </div>
                                    </div>
                                    <!-- Campo para Tamanho da T-shirt -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tamanho da T-shirt <span
                                                    class="text-danger"></span></label>
                                            <div class="form-control-plaintext">{{ $user->tshirt_size }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tenho autorização de imagem? <span
                                                    class="text-danger"></span></label>
                                            <div class="form-control-plaintext">
                                                {{ $user->image_authorization === 'sim' ? 'Sim' : 'Não' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Alergias Alimentares <span
                                                    class="text-danger"></span></label>
                                            <div class="form-control-plaintext">
                                                {{ $user->food_allergies === 'sim' ? 'Sim' : 'Não' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Se sim, indique as alergias aqui</label>
                                            <div class="form-control-plaintext">{{ $user->allergies_description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions text-center mt-4">
                                    <a href="{{ route('users') }}" class="btn btn-danger ms-2">Voltar a membros</a>
                                </div>
                            </form>
                        </div>
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
</body>

</html>
