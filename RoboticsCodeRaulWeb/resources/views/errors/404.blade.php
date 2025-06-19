<!DOCTYPE html>
<html lang="pt">

@include('layouts.frontoffice.head')

<body>
    @include('layouts.frontoffice.nav')

    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Erro 404</h1>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="{{ asset('assets/img/hero-img.png') }}" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">Erro 404</h1>
                    <h1 class="mb-4">Página não encontrada</h1>
                    <p class="mb-4">Pedimos desculpa, mas a página que tentou procurar não existe no nosso site, pondere
                        em usar a barra de pesquisa para encontrar uma existente.</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="index.php">Voltar à página inicial</a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.frontoffice.footer')

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>

    @include('layouts.frontoffice.scripts')
</body>

</html>