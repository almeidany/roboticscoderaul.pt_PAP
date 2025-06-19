<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.users.head')

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
                            <h4 class="mb-0 text-white text-center">Editar Perfil</h4>
                        </div>

                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('users.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Primeiro Nome</label>
                                            <input type="text" name="first_name"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                value="{{ old('first_name', $user->first_name) }}">
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Último Nome</label>
                                            <input type="text" name="last_name"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name', $user->last_name) }}">
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número de Processo</label>
                                            <input type="text" name="schoolnumber"
                                                class="form-control @error('schoolnumber') is-invalid @enderror"
                                                value="{{ old('schoolnumber', $user->schoolnumber) }}">
                                            @error('schoolnumber')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Data de Nascimento</label>
                                            <input type="date" name="birth_date"
                                                class="form-control @error('birth_date') is-invalid @enderror"
                                                value="{{ old('birth_date', $user->birth_date) }}">
                                            @error('birth_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Número de Telefone</label>
                                            <input type="tel" name="phonenumber"
                                                class="form-control @error('phonenumber') is-invalid @enderror"
                                                value="{{ old('phonenumber', $user->phonenumber) }}">
                                            @error('phonenumber')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Turma <span class="text-danger"></span></label>
                                            <input type="text" name="class"
                                                class="form-control @error('class') is-invalid @enderror"
                                                value="{{ old('class', $user->class) }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tamanho da T-shirt</label>
                                            <select name="tshirt_size" id="tshirt_size"
                                                class="select2 form-control @error('tshirt_size') is-invalid @enderror"
                                                required style="width: 100%;">
                                                <option value="" disabled
                                                    {{ old('tshirt_size', $user->tshirt_size) ? '' : 'selected' }}>
                                                    Selecione o tamanho</option>
                                                @foreach ($tshirt_sizes as $size)
                                                    <option value="{{ $size->tshirt_size }}"
                                                        @if (old('tshirt_size', $user->tshirt_size) == $size->tshirt_size) selected @endif>
                                                        {{ $size->tshirt_size }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tshirt_size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Alergias Alimentares</label>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="food_allergies" id="alergiasSim" value="sim"
                                                        {{ old('food_allergies', $user->food_allergies) === 'sim' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="alergiasSim">Sim</label>
                                                </div>
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="food_allergies" id="alergiasNao" value="nao"
                                                        {{ old('food_allergies', $user->food_allergies) === 'nao' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="alergiasNao">Não</label>
                                                </div>
                                            </div>
                                            @error('food_allergies')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tenho autorização de imagem?</label>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="image_authorization" id="authSim" value="sim"
                                                        @checked(old('image_authorization', $user->image_authorization) === 'sim')>
                                                    <label class="form-check-label" for="authSim">Sim</label>
                                                </div>
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="image_authorization" id="authNao" value="nao"
                                                        @checked(old('image_authorization', $user->image_authorization) === 'nao')>
                                                    <label class="form-check-label" for="authNao">Não</label>
                                                </div>
                                            </div>
                                            @error('image_authorization')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Foto de Perfil</label>
                                        <input class="form-control @error('photo') is-invalid @enderror"
                                            type="file" name="photo" id="formFile">
                                        @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Se sim, indique as alergias aqui</label>
                                            <textarea class="form-control @error('allergies_description') is-invalid @enderror" name="allergies_description"
                                                rows="3">{{ old('allergies_description', $user->allergies_description) }}</textarea>
                                            @error('allergies_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                    <a href="{{ route('users') }}" class="btn btn-danger ms-2">Cancelar</a>
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
    <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2_config.js') }}"></script>
    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/fp_members.js') }}"></script>
</body>

</html>
