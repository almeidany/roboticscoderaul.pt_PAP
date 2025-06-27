<!DOCTYPE html>
<html lang="en">

@include('layouts.register.head')

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5" style="width: 140%; align-items: center; margin-left: -20%;">
                <div class="card-heading">
                    <h2 class="title">Registo de Membro</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nome -->
                        <div class="form-row">
                            <div class="name">Nome</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5 @error('first_name') is-invalid @enderror"
                                                type="text" name="first_name" value="{{ old('first_name') }}"
                                                placeholder="Primeiro Nome" required style="">
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5 @error('last_name') is-invalid @enderror"
                                                type="text" name="last_name" value="{{ old('last_name') }}"
                                                placeholder="Último Nome" required style="width: 100%">
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ... (código anterior mantido igual até a seção de Dados Pessoais) ... -->

                        <!-- Dados Pessoais -->
                        <div class="form-row">
                            <div class="name">Dados Pessoais</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search"
                                                style="margin-top: 20px;">
                                                <select name="tshirt_size" class="select2" required>
                                                    <option disabled selected>Tamanho T-shirt</option>
                                                    @foreach ($tshirt_sizes as $size)
                                                        <option value="{{ $size->tshirt_size }}"
                                                            {{ old('tshirt_size') == $size->tshirt_size ? 'selected' : '' }}>
                                                            {{ $size->tshirt_size }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input type="date" name="birth_date" class="input--style-5" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ... (restante do código mantido igual) ... -->

                        <!-- Email e Telefone -->
                        <div class="form-row">
                            <div class="name">Contactos</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5 @error('email') is-invalid @enderror"
                                                type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Email Institucional" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5 @error('phonenumber') is-invalid @enderror"
                                                type="text" name="phonenumber" value="{{ old('phonenumber') }}"
                                                placeholder="Número de Telefone" required>
                                            @error('phonenumber')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Turma e Tamanho T-shirt -->
                        <div class="form-row">
                            <div class="name">Escola</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <div class="rs-select2 js-select-simple select--no-search"
                                                style="margin-top: 20px;">
                                                <select name="class" class="select2" required>
                                                    <option disabled selected>Turma</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->class_year . $class->class }}"
                                                            {{ old('class') == $class->class_year . $class->class ? 'selected' : '' }}>
                                                            {{ $class->class_year . $class->class }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('class')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5 @error('schoolnumber') is-invalid @enderror"
                                                type="text" name="schoolnumber" value="{{ old('schoolnumber') }}"
                                                placeholder="Número de Processo" required style="width: 100%;">
                                            <!-- width 100% -->
                                            @error('schoolnumber')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Alergias -->
                        <div class="form-row">
                            <div class="name">Alergias Alimentares</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <div class="p-t-10"> <!-- Ajuste no padding -->
                                                <label class="radio-container m-r-55" style="margin-left: 45px;">Sim
                                                    <input type="radio" name="food_allergies" value="sim"
                                                        @if (old('food_allergies') === 'sim') checked @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio-container" style="margin-left: 45px;">Não
                                                    <input type="radio" name="food_allergies" value="nao"
                                                        @if (old('food_allergies') === 'nao') checked @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            @error('food_allergies')
                                                <div class="invalid-feedback d-block">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input
                                                class="input--style-5 @error('allergies_description') is-invalid @enderror"
                                                type="text" name="allergies_description"
                                                value="{{ old('allergies_description') }}"
                                                placeholder="Indique-as se precisar">
                                            @error('allergies_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Autorização Imagem e Foto -->
                        <div class="form-row" style="margin-bottom: 20px;">
                            <!-- Ajuste no margin-bottom -->
                            <div class="name">Imagem</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <div class="p-t-10"> <!-- Ajuste no padding -->
                                                <label class="radio-container m-r-55" style="margin-left: 45px;">Sim
                                                    <input type="radio" name="image_authorization" value="sim"
                                                        @if (old('image_authorization') === 'sim') checked @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio-container" style="margin-left: 45px;">Não
                                                    <input type="radio" name="image_authorization" value="nao"
                                                        @if (old('image_authorization') === 'nao') checked @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            @error('image_authorization')
                                                <div class="invalid-feedback d-block">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <label for="formFile" class="btn btn--radius-2 btn--red"
                                                style="cursor:pointer; display:block; width:100%; text-align:center;">
                                                ESCOLHER FOTO
                                            </label>
                                            <input class="input--style-5 @error('photo') is-invalid @enderror"
                                                type="file" name="photo" id="formFile" style="display:none;">
                                            @error('photo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- ...existing code... -->
                                </div>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5 @error('password') is-invalid @enderror"
                                                type="password" name="password" required
                                                placeholder="Palavra-passe de 8 digitos">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="password"
                                                name="password_confirmation" placeholder="Reescreva a palavra-passe">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="text-align: center; margin-top: 30px;">
                            <button class="btn btn--radius-2 btn--red" type="submit">Registar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2_config.js') }}"></script>
    <script src="{{ asset('/assets/js/fp_users.js') }}"></script>
    <script src="{{ asset('/assets/js/global.js') }}"></script>

</body>

</html>
