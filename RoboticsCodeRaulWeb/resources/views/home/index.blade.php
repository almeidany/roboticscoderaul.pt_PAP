<!DOCTYPE html>
<html lang="pt-PT">

@include('layouts.frontoffice.head')

<body>

    @include('layouts.frontoffice.nav')

    <!-- Hero Start -->
    <section class="container-fluid pt-5 bg-primary hero-header mb-5">
        <div class="container pt-5">
            <div class="row g-5 pt-5 align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4">
                    <span class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated fadeInUp">Robotics Code
                        Raul</span>
                    <h1 class="display-4 text-white mb-4 animated fadeInUp">O clube de robótica do AERP</h1>
                    <p class="text-white mb-4 animated fadeInUp">
                        Aqui oferecemos aos alunos uma oportunidade de explorar a ciência e tecnologia, desenvolvendo
                        habilidades práticas em programação e engenharia.
                        Com atividades colaborativas, preparamos os estudantes para os desafios do futuro digital.
                    </p>
                    <a href="https://www.aerp.pt"
                        class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated fadeInUp" target="_blank">Saiba
                        Mais</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <img class="img-fluid animated fadeInUp" src="{{ asset('assets/img/hp1.png') }}" alt="Imagem Hero">
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- About Start -->
    <section class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ asset('assets/img/printer.png') }}" alt="Imagem sobre">
                </div>
                <div class="col-lg-6">
                    <span class="btn btn-sm border rounded-pill text-primary px-3 mb-3">O Início</span>
                    <h1 class="mb-4">Um começo da robótica no agrupamento</h1>
                    <p>
                        Um dia, o professor Luís Fernandes decidiu fundar um clube de programação e robótica na Escola
                        Secundária Raúl Proença. O objetivo: ensinar programação e construção de robôs. Este espaço
                        tornou-se rapidamente um local de aprendizagem e inovação, com participação em competições e
                        foco no trabalho em equipa. Veja mais em
                        <a href="{{ route('about_us') }}">sobre nós</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->

    <div class="sponsors-section" style="background-color: #f5f5f5; padding: 40px 0;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 10px; color: #333;">Os Nossos Patrocinadores</h2>
            <p style="text-align: center; color: #666; margin-bottom: 30px;">
                Agradecemos aos nossos patrocinadores pelo apoio
            </p>

            <div class="sponsors-carousel-container">
                <div class="sponsors-carousel-track">
                    @foreach ($sponsers as $sponsor)
                        <div class="sponsor-item"
                            style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center;">
                            <a href="{{ $sponsor->link }}" target="_blank"
                                style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;">
                                <img src="{{ asset('storage/images/sponsers/' . $sponsor->photo) }}"
                                    style="max-width: 85%; max-height: 85%; object-fit: contain; display: block; margin: 0 auto;">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- Feature Start -->
    <section class="container-fluid bg-primary feature pt-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-6 text-white">
                    <span class="btn btn-sm border rounded-pill text-white px-3 mb-3">Porquê escolher o nosso
                        clube?</span>
                    <h1 class="mb-4 text-white">Veja aqui o porquê!</h1>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-3">
                            <i class="fa fa-check bg-white text-primary rounded-circle p-2 me-3"></i>
                            Desenvolvimento de projetos na área
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="fa fa-check bg-white text-primary rounded-circle p-2 me-3"></i>
                            Realização de workshops temáticos
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="fa fa-check bg-white text-primary rounded-circle p-2 me-3"></i>
                            Participação em concursos e eventos
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="fa fa-check bg-white text-primary rounded-circle p-2 me-3"></i>
                            Trabalho em equipa
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/hp3.png') }}" alt="Imagem de destaque">
                </div>
            </div>
        </div>
    </section>
    <!-- Feature End -->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Questões Frequentes</div>
                <h1 class="mb-4">Veja aqui se encontra alguma questão que possa ter</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFAQ1">
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.1s">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Como me posso inscrever no clube de robótica?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Basta ser um aluno da escola e ir a um dia do clube, para, fazer lá a sua inscrição
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Quais são os horários do clube?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    O clube de robótica funciona todas as quartas-feiras das 11h50 às 13h20 Sala 35
                                    e,
                                    sextas-feiras das 13h35 às 16h00. Sala-34.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.3s">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Quais são os tipos de projetos que poderemos desenvolver no clube?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    No clube, podemos trabalhar numa variedade de projetos, como robôs, carros,
                                    sistemas de automação e competições de robótica. As possibilidades são
                                    ilimitadas!
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.4s">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    É preciso ter materiais para participar no clube?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Não, qualquer material como portáteis, circuitos e afins são fornecidos por nós,
                                    basta trazer a sua vontade de aprender e de se divertir. Claro que, se quiser
                                    trazer
                                    portátil pessoal ou semelhante poderá.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFAQ2">
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.6s">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Que concursos e eventos poderei participar ao estar no clube?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Poderá participar no Festival Nacional da Robótica, Bot0lympics, Roboparty e
                                    Olimpiadas da Robótica. Pode consultar individualmente sobre cada um, no menu <a
                                        href="{{ route('contest.front') }}">Concursos</a>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.7s">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                    Quem são os professores responsáveis pelo clube?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="headingSeven" data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Os professores responsáveis pelo clube são, a professora Sónia Rodrigues e o
                                    professor Luís Fernandes.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.5s">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    Posso participar de projetos mesmo que não tenha experiência prévia?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Sim, todos são bem-vindos! Temos membros e professores experientes que estarão
                                    disponíveis
                                    para
                                    ajudar e orientar aqueles que estão começando.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.8s">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false"
                                    aria-controls="collapseEight">
                                    O clube oferece suporte para projetos escolares?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse"
                                aria-labelledby="headingEight" data-bs-parent="#accordionFAQ2">
                                <div class="accordion-body">
                                    Sim, estamos felizes em ajudar membros que desejam desenvolver projetos
                                    relacionados
                                    à escola ou que precisem de suporte para competições acadêmicas.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <!-- Texto de introdução -->
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">A Nossa Equipa</div>
                    <h1 class="mb-4">Conhece a Nossa Equipa</h1>
                    <p class="mb-4">
                        O Clube de Programação e Robótica é coordenado pelo Prof. Luís Fernandes, com vasta experiência
                        em robótica,
                        e tem o apoio da Prof.ª Sónia Rodrigues, que asseguram o sucesso das atividades.
                        Juntos, combinam criatividade e técnica para enfrentar desafios e explorar novas fronteiras na
                        robótica.
                    </p>
                </div>
                <!-- Perfis da equipa -->
                <div class="col-lg-7">
                    <div class="row g-4">
                        <!-- Luís Fernandes -->
                        <div class="col-md-6">
                            <div class="team-item bg-white text-center rounded p-4 pt-0 wow fadeIn"
                                data-wow-delay="0.3s">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset('assets/img/foto_L.jpg') }}"
                                    alt="Prof. Luís Fernandes">
                                <h5 class="mb-0">Prof. Luís Fernandes</h5>
                                <small>Coordenador</small>
                                <div class="d-flex justify-content-center mt-3">
                                    <a class="btn btn-square btn-primary m-1"
                                        href="https://www.linkedin.com/in/lu%C3%ADs-fernandes-15904977/"
                                        target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a class="btn btn-square btn-primary m-1"
                                        href="https://www.youtube.com/@luisfernandes6940" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Sónia Rodrigues -->
                        <div class="col-md-6">
                            <div class="team-item bg-white text-center rounded p-4 pt-0 wow fadeIn"
                                data-wow-delay="0.5s">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset('assets/img/foto_S.jpeg') }}"
                                    alt="Prof.ª Sónia Rodrigues">
                                <h5 class="mb-0">Prof.ª Sónia Rodrigues</h5>
                                <small>Professora</small>
                                <div class="d-flex justify-content-center mt-3">
                                    <a class="btn btn-square btn-primary m-1"
                                        href="https://www.linkedin.com/in/s%C3%B3nia3rodrigues/" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a class="btn btn-square btn-primary m-1"
                                        href="https://www.youtube.com/c/S%C3%B3niaRodrigues" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .row -->
                </div>
            </div> <!-- .row -->
        </div>
    </div>

    @include('layouts.frontoffice.footer')

    @include('layouts.frontoffice.cookies')
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i
            class="bi bi-arrow-up"></i></a>

    @include('layouts.frontoffice.scripts')
    <script src="{{ asset('assets/js/sponser_banner.js') }}"></script>

</body>

</html>
