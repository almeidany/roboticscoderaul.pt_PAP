<div class="container-fluid bg-dark text-white-50 footer pt-5 position-relative">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <a href="{{ route('home') }}" class="d-inline-block mb-3" style="display: flex; justify-content: center;">
                    <h1 style="margin-bottom: 10px;">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid"
                            style="max-height: 100px;">
                    </h1>
                </a>

                <p class="mb-0 text-center" style="margin-bottom: 12px;">
                    Robotics Code Raul: Incentivando a inovação e a aprendizagem através da tecnologia e da robótica.
                </p>

                <a href="https://www.sitestar.pt/" style="display: flex; justify-content: center; margin-top: 8px;"
                    target="_blank">
                    <img src="{{ asset('assets/img/sitestar_logo.png') }}" alt="Logo" class="img-fluid"
                        style="max-height: 75px;">
                </a> <!-- Fechado corretamente -->

            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                <h5 class="text-white mb-4">Entre em Contacto Connosco</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>R. Dom João II 33, 2500-852 Caldas<span
                        style="text-indent: 28px; display: inline-block;"> da Rainha</span></p>
                <p><i class="fa fa-phone-alt me-3"></i>262 740 560</p>
                <p><i class="fa fa-envelope me-3"></i>clube.robotica@aerp.pt</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-redes-sociais px-4 py-2"
                        href="https://linktr.ee/RoboticsCodeRaul/" target="_blank">
                        <i class="fas fa-share-alt me-2"></i>Redes Sociais
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <h5 class="text-white mb-4">Páginas Populares</h5>
                <a class="btn btn-link" href="{{ route('about_us') }}">Sobre Nós</a>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <h5 class="text-white mb-4">Outros Links</h5>
                <a class="btn btn-link" href="https://aerp.pt/" target="_blank">Portal da Escola</a>
            </div>
        </div>
    </div>

    <div class="container wow fadeIn" data-wow-delay="0.1s">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; Robotics Code Raul, Todos os direitos reservados.
                    Projetado por Tiago Almeida e Luís Fernandes. Distribuído por
                    <a class="border-bottom" href="https://aerp.pt" target="_blank">AERP</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Página Inicial</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
