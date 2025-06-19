<!DOCTYPE html>
<html lang="pt-PT">

@include('layouts.frontoffice.head_sobrenos')

<body>

    @include('layouts.frontoffice.nav')
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header mb-5">
        <div class="container pt-5">
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-5">
                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex justify-content-center">
                                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">
                                    Um Pouco Mais Sobre a Nossa História
                                </div>
                            </div>
                            <h1 class="mb-4 text-center">Do Ensino à Excelência em Robótica Educativa</h1>
                            <p class="mb-4 text-justify">
                                O Clube de Programação e Robótica – Robotics Code Raul – está sediado na Escola Secundária
                                Raul Proença e dedica-se ao desenvolvimento de competências tecnológicas e de programação
                                entre os alunos. Em funcionamento desde o ano letivo de 2016-2017, quando foi oficialmente
                                registado na base de dados da Direção-Geral de Educação (DGE), tem vindo a crescer tanto no
                                número de participantes quanto na qualidade dos projetos desenvolvidos.
                                Através da criação de projetos e da participação em competições nacionais de robótica, o
                                clube promove o pensamento crítico, a criatividade e a colaboração, preparando os jovens
                                para os desafios do futuro e incentivando a excelência na área da robótica educativa. Nos
                                últimos anos, tem alcançado resultados de destaque, com participações e prémios em diversas
                                competições a nível nacional.
                                Atualmente, conta com trinta alunos inscritos no clube, com idades entre os 13 e os 19 anos e
                                tem como principais objetivos: investigar e o desenvolver projetos envolvendo robôs e
                                circuitos eletrónicos; proporcionar a aprendizagem de conceitos fundamentais de
                                programação, de forma lúdica e participar e dinamizar iniciativas que se enquadrem no uso
                                das Linguagens de Programação e Robótica, nomeadamente, workshops e concursos nacionais
                                de programação e robótica. É também, nosso objetivo que todos os alunos do clube tenham a
                                oportunidade de participar, todos os anos, em pelo menos um concurso nacional de
                                programação e robótica.
                            </p>
                        </div>

                        <!-- Iframe para telemóveis (já existente, mantido como está) -->
                        <div class="col-12">
                            <div class="map-mobile" style="position: relative; padding-bottom: 70%; height: 0; overflow: hidden;">
                                <iframe src="https://www.google.com/maps/embed?pb=!4v1697040731234!6m8!1m7!1sJF74N4lm4BkqoeLhX_s8iA!2m2!1d39.4103554!2d-9.1456658!3f90!4f34.37!5f0.7820865974627469"
                                    frameborder="0"
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>

                        <!-- Iframe para PCs -->
                        <div class="col-12">
                            <div class="map-desktop" style="width: 750px; margin: 0 auto;">
                                <iframe src="https://www.google.com/maps/embed?pb=!4v1697040731234!6m8!1m7!1sJF74N4lm4BkqoeLhX_s8iA!2m2!1d39.4103554!2d-9.1456658!3f90!4f34.37!5f0.7820865974627469"
                                    frameborder="0"
                                    style="width: 100%; height: 450px; border: 0;"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Footer Start -->
    @include('layouts.frontoffice.footer')

    @include('layouts.frontoffice.cookies')
    
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>

    @include('layouts.frontoffice.scripts')

</body>

</html>
