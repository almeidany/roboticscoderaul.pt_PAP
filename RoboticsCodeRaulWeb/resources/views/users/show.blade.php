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
                                            <input type="text" name="first_name"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                value="{{ old('first_name', $user->first_name) }}" @readonly(true)
                                                @disable(true)>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Último Nome <span
                                                    class="text-danger"></span></label>
                                            <input type="text" name="last_name"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name', $user->last_name) }}" @readonly(true)
                                                @disable(true)>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número de Processo <span
                                                    class="text-danger"></span></label>
                                            <input type="text" name="schoolnumber"
                                                class="form-control @error('schoolnumber') is-invalid @enderror"
                                                value="{{ old('schoolnumber', $user->schoolnumber) }}" @readonly(true)
                                                @disable(true)>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Data de Nascimento <span
                                                    class="text-danger"></span></label>
                                            <input type="date" name="birth_date"
                                                class="form-control @error('birth_date') is-invalid @enderror"
                                                value="{{ old('birth_date', $user->birth_date) }}" @readonly(true)
                                                @disable(true)>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-danger"></span></label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', $user->email) }}" @readonly(true)
                                                @disable(true)>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número de Telefone <span
                                                    class="text-danger"></span></label>
                                            <input type="tel" name="phonenumber"
                                                class="form-control @error('phonenumber') is-invalid @enderror"
                                                value="{{ old('phonenumber', $user->phonenumber) }}" @readonly(true)
                                                @disable(true)>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Turma <span class="text-danger"></span></label>
                                            <input type="text" name="class"
                                                class="form-control @error('class') is-invalid @enderror"
                                                value="{{ old('class', $user->class) }}" readonly>
                                        </div>
                                    </div>
                                    <!-- Campo para Tamanho da T-shirt -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tamanho da T-shirt <span
                                                    class="text-danger"></span></label>
                                            <input type="text" name="tshirt_size"
                                                class="form-control @error('tshirt_size') is-invalid @enderror"
                                                value="{{ old('tshirt_size', $user->tshirt_size) }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tenho autorização de imagem? <span
                                                    class="text-danger"></span></label>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="image_authorization" id="authSim" value="sim"
                                                        @checked(old('image_authorization', $user->image_authorization) === 'sim') @readonly(true)
                                                        @disable(true)>
                                                    <label class="form-check-label" for="authSim">Sim</label>
                                                </div>
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="image_authorization" id="authNao" value="nao"
                                                        @checked(old('image_authorization', $user->image_authorization) === 'nao') @readonly(true)
                                                        @disable(true)>
                                                    <label class="form-check-label" for="authNao">Não</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Alergias Alimentares <span
                                                    class="text-danger"></span></label>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="food_allergies" id="alergiasSim" value="sim"
                                                        {{ old('food_allergies', $user->food_allergies) === 'sim' ? 'checked' : '' }}
                                                        @readonly(true) @disable(true)>
                                                    <label class="form-check-label" for="alergiasSim">Sim</label>
                                                </div>
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="food_allergies" id="alergiasNao" value="nao"
                                                        {{ old('food_allergies', $user->food_allergies) === 'nao' ? 'checked' : '' }}
                                                        @readonly(true) @disable(true)>
                                                    <label class="form-check-label" for="alergiasNao">Não</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Se sim, indique as alergias aqui</label>
                                            <textarea class="form-control @error('allergies_description') is-invalid @enderror" name="allergies_description"
                                                rows="3" @readonly(true) @disable(true)>{{ old('allergies_description', $user->allergies_description) }}</textarea>
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
