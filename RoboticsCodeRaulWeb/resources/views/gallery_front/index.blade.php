@extends('layouts.frontoffice.gallery')

@section('content')
    <main id="main">
        <!-- ======= Portfolio Section ======= -->
        <section id="eventos" class="portfolio">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <form method="GET" action="{{ route('gallery.front') }}">
                            <div class="row" data-aos="fade-up" data-aos-delay="200">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <select id="contest-filter" name="contest_id" class="form-select select2"
                                        style="width: 300px;" onchange="this.form.submit()">
                                        <option value="all"
                                            {{ request('contest_id') == null || request('contest_id') == 'all' ? 'selected' : '' }}>
                                            Todos os Concursos
                                        </option>
                                        @if ($selectedContest && $selectedContest !== 'all')
                                            @php
                                                $contest = $contestID->firstWhere('id', $selectedContest);
                                            @endphp

                                            @if ($contest)
                                                <div style="margin-bottom: 20px; font-weight: bold;">
                                                    Fotos do concurso: <strong>{{ $contest->name }}</strong> - Ano:
                                                    <strong>{{ $contest->year }}</strong>
                                                </div>
                                            @else
                                                <div style="margin-bottom: 20px; font-weight: bold;">
                                                    Concurso desconhecido
                                                </div>
                                            @endif
                                        @else
                                            <div style="margin-bottom: 20px; font-weight: bold;">
                                                Mostrando fotos de todos os concursos
                                            </div>
                                        @endif
                                        @foreach ($contestID as $contest)
                                            <option value="{{ $contest->id }}"
                                                {{ request('contest_id') == $contest->id ? 'selected' : '' }}>
                                                {{ $contest->name }} ({{ $contest->year }})
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                    @foreach ($galleries as $gallery)
                        <div class="col-lg-4 col-md-6 portfolio-item contest-{{ $gallery->contest_id }}">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('storage/images/gallery/' . $gallery->photo) }}" class="img-fluid"
                                    alt="{{ $gallery->title }}">
                                <div class="portfolio-info">
                                    <h4>{{ $gallery->title }}</h4>
                                    <p>{{ $gallery->year }} - {{ $gallery->palmares }}</p>
                                    <div class="portfolio-links" style="text-align: right; width: 100%;">
                                        <a href="{{ asset('storage/images/gallery/' . $gallery->photo) }}"
                                            data-gall="portfolioGallery{{ $gallery->id }}" class="venobox"
                                            title="{{ $gallery->title }}">
                                            <i class="bx bx-image-add"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection
<script>
    $(document).ready(function() {
        $('#contest-filter').select2();

        $('#contest-filter').on('change', function() {
            let contestId = $(this).val();
            if (contestId === 'all') {
                window.location.href = '{{ url('/galeria/front') }}';
            } else {
                window.location.href = '{{ url('/galeria/front') }}?contest_id=' + contestId;
            }
        });
    });
</script>
