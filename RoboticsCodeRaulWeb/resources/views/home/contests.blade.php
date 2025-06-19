<!DOCTYPE html>
<html lang="pt-PT">

@include('layouts.frontoffice.head_concursos')

<body>
    @include('layouts.frontoffice.nav')

    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6 align-self-end text-center text-lg-end">
            </div>
        </div>
    </div>

    <!-- Service Start -->
<div class="container py-5">
    <div class="row g-5 align-items-center">
        <!-- Texto Introductório -->
        <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Concursos em que Participamos</div>
            <h1 class="mb-4">Desafios e Competições de Robótica</h1>
            <p class="mb-4">
                Participe em concursos de robótica por todo o país e ponha à prova as suas competências!
                Estas competições incentivam a criatividade, o raciocínio lógico e a inovação.
                Terá a oportunidade de competir com equipas de várias escolas, enfrentar desafios reais
                e destacar-se no panorama da robótica escolar em Portugal. Prepare-se para se superar e mostrar todo o seu potencial!
            </p>
        </div>

        <!-- Boxes de Concursos -->
        <div class="col-lg-7">
            <div class="row g-4">
                <!-- Coluna 1 -->
                <div class="col-md-6">
                    <div class="row g-4">
                        <!-- BotOlympics -->
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded overflow-hidden">
                                <div class="service-icon btn-square">
                                    <img src="{{ asset('assets/img/botolympics_logo.png') }}" class="img-fluid" style="max-width: 100%; height: auto;">
                                </div>
                                <h5 class="mb-3">BotOlympics</h5>
                                <p>
                                    Concurso nacional onde equipas constroem robôs para cumprir desafios específicos como resgates e corridas.
                                </p>
                                <a class="btn px-3 mt-auto mx-auto" href="https://botolympics.pt/" target="_blank">Veja Mais</a>
                            </div>
                        </div>

                        <!-- Festival Nacional da Robótica -->
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded overflow-hidden">
                                <div class="service-icon btn-square">
                                    <img src="{{ asset('assets/img/fnr_logo.png') }}" class="img-fluid" style="max-width: 100%; height: auto;">
                                </div>
                                <h5 class="mb-3">Festival Nacional da Robótica</h5>
                                <p>
                                    Competição anual onde equipas programam robôs para resolver desafios, promovendo ciência e tecnologia.
                                </p>
                                <a class="btn px-3 mt-auto mx-auto" href="https://www.festivalnacionalrobotica.pt/" target="_blank">Veja Mais</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Coluna 2 -->
                <div class="col-md-6 pt-md-4">
                    <div class="row g-4">
                        <!-- Olimpiadas de Robótica -->
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded overflow-hidden">
                                <div class="service-icon btn-square">
                                    <img src="{{ asset('assets/img/odr_logo.png') }}" class="img-fluid" style="max-width: 100%; height: auto;">
                                </div>
                                <h5 class="mb-3">Olimpíadas de Robótica</h5>
                                <p>
                                   Os Alunos enfrentam desafios como resgates e corridas com robôs, promovendo o trabalho em equipa.
                                </p>
                                <a class="btn px-3 mt-auto mx-auto" href="https://olimpiadasderobotica.anpri.pt/" target="_blank">Veja Mais</a>
                            </div>
                        </div>

                        <!-- Roboparty -->
                        <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded overflow-hidden">
                                <div class="service-icon btn-square">
                                    <img src="{{ asset('assets/img/roboparty_logo.png') }}" class="img-fluid" style="max-width: 100%; height: auto;">
                                </div>
                                <h5 class="mb-3">Roboparty</h5>
                                <p>
                                    Onde os participantes resolvem desafios em tempo real com robôs — pura criatividade e inovação!
                                </p>
                                <a class="btn px-3 mt-auto mx-auto" href="https://www.roboparty.org/" target="_blank">Veja Mais</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- /col-md-6 -->
            </div>
        </div> <!-- /col-lg-7 -->
    </div> <!-- /row -->
</div>
<!-- Service End -->

    <!-- Footer Start -->
    @include('layouts.frontoffice.footer')

    @include('layouts.frontoffice.cookies')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>

    @include('layouts.frontoffice.scripts')

</body>

</html>