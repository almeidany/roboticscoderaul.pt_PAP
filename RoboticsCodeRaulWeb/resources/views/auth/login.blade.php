<!-- filepath: c:\Users\tiaguitosgamer\Documents\roboticscoderaul.pt_PAP\RoboticsCodeRaulWeb\resources\views\auth\login.blade.php -->
<!DOCTYPE html>
<html lang="en">

@include('layouts.login.head')

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('assets/images/login_imagem.png') }}">
                </div>
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title">
                        Aceder
                    </span>

                    <!-- Campo para Email -->
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" placeholder="Email" required
                            value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                        </span>
                    </div>
                    @if ($errors->has('email'))
                        <p class="label-error" style="color: rgb(0, 0, 0); margin-left: 10px;">
                            {{ $errors->first('email') }}
                        </p>
                    @endif

                    <!-- Campo para Senha -->
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="password" placeholder="Palavra-Passe" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="bi bi-lock-fill" aria-hidden="true"></i>
                        </span>
                    </div>
                    @if ($errors->has('password'))
                        <p class="label-error" style="color: rgb(0, 0, 0); margin-left: 10px;">
                            {{ $errors->first('password') }}
                        </p>
                    @endif

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Entrar
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{ route('register') }}" style="zoom: 1.3;">
                            Cria a tua conta
                            <i class="bi bi-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/popper/js/popper.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/js/login.js') }}"></script>
