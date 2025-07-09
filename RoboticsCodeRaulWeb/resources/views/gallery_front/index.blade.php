@extends('layouts.frontoffice.gallery')

@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs" style="background-color: #E8E8E8;">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2></h2>
                    <ol>
                        <li><a href="/">Início</a></li>
                        <li>Galeria</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->
        <!-- ======= Portfolio Section ======= -->
        <section id="eventos" class="portfolio">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Galeria</h2>
                    {{-- <p>Fotografias das diversas atividades dinamizadas pelo Clube de Programação e Robótica</p> --}}
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Todos</li>
                            @foreach ($categorias as $categoria)
                                <li data-filter=".{{ $categoria->id }}">{{ $categoria->designacao }}</li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

                    @foreach ($eventos as $evento)
                        {{-- Se um evento não tiver fotos, não aparece na página inicial --}}
                        @if (json_decode($evento->fotodes) != [])
                            <div class="col-lg-4 col-md-6 portfolio-item {{ $evento->categoria_id }}">
                                @foreach (json_decode($evento->fotodes) as $item)
                                    @if ($loop->index != 0)
                                        <div class="portfolio-wrap" style='display: none;'>
                                            <img src="{{ asset('storage/uploads/eventos/' . $evento->id) . '/' . json_decode($evento->fotodes)[$loop->index] }}"
                                                class="img-fluid" alt="">
                                            <div class="portfolio-info">
                                                <div class="portfolio-links">
                                                    <a href="{{ asset('storage/uploads/eventos/' . $evento->id) . '/' . json_decode($evento->fotodes)[$loop->index] }}"
                                                        data-gall="portfolioGallery{{ $evento->id }}" class="venobox"
                                                        title="{{ $evento->designacao }}"><i class="bx bx-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="portfolio-wrap">
                                            <img src="{{ asset('storage/uploads/eventos/' . $evento->id) . '/' . json_decode($evento->fotodes)[$loop->index] }}"
                                                class="img-fluid" alt="">
                                            <div class="portfolio-info">
                                                <h4>{{ $evento->designacao }}</h4>
                                                <p>{{ $evento->data }}</p>
                                                <div class="portfolio-links" style="text-align: right; width: 100%;">

                                                    <a href="{{ asset('storage/uploads/eventos/' . $evento->id) . '/' . json_decode($evento->fotodes)[$loop->index] }}"
                                                        data-gall="portfolioGallery{{ $evento->id }}" class="venobox"
                                                        title="{{ $evento->designacao }}"><i
                                                            class="bx bx-image-add"></i></a>

                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection
