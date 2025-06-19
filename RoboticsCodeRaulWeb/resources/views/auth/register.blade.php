  <!DOCTYPE html>
  <html>

  @include('layouts.register.head')

  <body>
      <div class="main">
          <input type="checkbox" id="chk" aria-hidden="true">

          <div class="card-body">
              @if (session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('message') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
          </div>

          <!-- Formulário de Registro -->
          <div class="signup">
              <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  @csrf
                  <label for="chk" aria-hidden="true">Registar</label>

                  <div class="row">
                      <!-- Primeiro Nome -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Primeiro Nome</label>
                              <input type="text" name="first_name" id="first_name"
                                  class="form-field @error('first_name') is-invalid @enderror"
                                  value="{{ old('first_name') }}" placeholder="Primeiro Nome" required>
                              @error('first_name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      <!-- Último Nome -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Último Nome</label>
                              <input type="text" name="last_name" id="last_name"
                                  class="form-field @error('last_name') is-invalid @enderror"
                                  value="{{ old('last_name') }}" placeholder="Último Nome" required>
                              @error('last_name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <!-- Número de Aluno -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Número de Aluno</label>
                              <input type="text" name="schoolnumber" id="schoolnumber"
                                  class="form-field @error('schoolnumber') is-invalid @enderror"
                                  value="{{ old('schoolnumber') }}" placeholder="Número de Aluno" required>
                              @error('schoolnumber')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      <!-- Data de Nascimento -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Data de Nascimento</label>
                              <input type="date" name="birth_date" id="birth_date"
                                  class="form-field @error('birth_date') is-invalid @enderror"
                                  value="{{ old('birth_date') }}" required>
                              @error('birth_date')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <!-- Email -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Email</label>
                              <input type="email" name="email" id="email"
                                  class="form-field @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                  placeholder="Email" required>
                              @error('email')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      <!-- Telefone -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Telefone</label>
                              <input type="text" name="phonenumber" id="phonenumber"
                                  class="form-field @error('phonenumber') is-invalid @enderror"
                                  value="{{ old('phonenumber') }}" placeholder="Telefone" required>
                              @error('phonenumber')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <!-- Turma/Classe -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Turma</label>
                              <input type="text" name="class" id="class"
                                  class="form-field @error('class') is-invalid @enderror" value="{{ old('class') }}"
                                  placeholder="Turma" required>
                              @error('class')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      <!-- Tamanho da T-shirt -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Tamanho da T-shirt</label>
                              <select name="tshirt_size" id="tshirt_size"
                                  class="select2 form-control @error('tshirt_size') is-invalid @enderror" required
                                  style="width: 100%;">
                                  <option value="" disabled {{ old('tshirt_size') ? '' : 'selected' }}>Selecione
                                      o tamanho</option>
                                  @foreach ($tshirt_sizes as $size)
                                      <option value="{{ $size->tshirt_size }}"
                                          @if (old('tshirt_size') == $size->tshirt_size) selected @endif>
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

                  <!-- Alergias Alimentares (full width) -->
                  <div class="row">
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Tem Alergias Alimentares?</label>
                              <div class="radio-group">
                                  <label class="radio-option">
                                      <input type="radio" name="food_allergies" value="sim"
                                          class="radio-input @error('food_allergies') is-invalid @enderror"
                                          @if (old('food_allergies') === 'sim') checked @endif>
                                      <span class="radio-text">Sim</span>
                                  </label>

                                  <label class="radio-option">
                                      <input type="radio" name="food_allergies" value="nao"
                                          class="radio-input @error('food_allergies') is-invalid @enderror"
                                          @if (old('food_allergies') === 'nao') checked @endif>
                                      <span class="radio-text">Não</span>
                                  </label>
                              </div>
                              @error('food_allergies')
                                  <div class="invalid-feedback d-block">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      <!-- Descrição das Alergias (full width) -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Descrição das Alergias</label>
                              <input type="text" name="allergies_description"
                                  class="form-field @error('allergies_description') is-invalid @enderror"
                                  value="{{ old('allergies_description') }}" placeholder="Descrição das Alergias">
                              @error('allergies_description')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="row"><!-- Autorização de Imagem -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Autorização de imagem?</label>
                              <div class="radio-group">
                                  <label class="radio-option">
                                      <input type="radio" name="image_authorization" value="sim"
                                          class="radio-input @error('image_authorization') is-invalid @enderror"
                                          @if (old('image_authorization') === 'sim') checked @endif>
                                      <span class="radio-text">Sim</span>
                                  </label>

                                  <label class="radio-option">
                                      <input type="radio" name="image_authorization" value="nao"
                                          class="radio-input @error('image_authorization') is-invalid @enderror"
                                          @if (old('image_authorization') === 'nao') checked @endif>
                                      <span class="radio-text">Não</span>
                                  </label>
                              </div>
                              @error('image_authorization')
                                  <div class="invalid-feedback d-block">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Foto</label>
                              <input class="form-control @error('photo') is-invalid @enderror" type="file"
                                  name="photo" id="formFile">
                              @error('photo')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Password</label>
                              <input type="password" name="password" id="password"
                                  class="form-field @error('password') is-invalid @enderror" placeholder="Password"
                                  required>
                              @error('password')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                      <!-- Confirmar Password -->
                      <div class="form-group col-md-6">
                          <div class="mb-3">
                              <label class="form-label">Confirmar Password</label>
                              <input type="password" name="password_confirmation" class="form-field"
                                  placeholder="Confirmar Password" required>
                          </div>
                      </div>
                  </div>

                  <!-- Botão Submeter -->
                  <div class="d-grid">
                      <button type="submit" class="mt-3">Concluir</button>
                  </div>
              </form>
          </div>
      </div>
      </div>
      <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('/assets/libs/select2/dist/js/select2.min.js') }}"></script>
      <script src="{{ asset('/assets/js/select2_config.js') }}"></script>
      <script src="{{ asset('/assets/js/register.js') }}"></script>
      <script src="{{ asset('/assets/js/fp_users.js') }}"></script>
      </div>
  </body>

  </html>
