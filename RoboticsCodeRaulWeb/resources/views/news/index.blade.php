<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.news.head_index')

<body>
    <div id="main-wrapper">
        @include('layouts.backoffice.sidebar')
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical">
                    @include('layouts.backoffice.nav')
                </div>
            </header>
            <!--  Header End -->
            <div class="body-wrapper">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="news-grid">
                    @foreach ($news as $item)
                        <div class="news-card">
                            <div class="news-card-header">
                                <img class="news-image" src="{{ asset('storage/images/news/' . $item->photo) }}"
                                    style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#newsImageModal"
                                    data-image="{{ asset('storage/images/news/' . $item->photo) }}">
                            </div>
                            <div class="news-card-body">
                                <h3 class="news-title">{{ Str::limit($item->title, 50) }}</h3>
                                <div class="news-meta">
                                    <span class="news-author">{{ $item->author_user }}</span>
                                    <span class="news-date">
                                        {{ $item->news_date ? \Carbon\Carbon::parse($item->news_date)->format('d/m/Y') : '' }}
                                    </span>
                                </div>
                            </div>
                            <div class="news-card-footer" style="justify-content: center; ">
                                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-outline-primary"
                                    title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{ route('news.show', $item->id) }}" class="btn btn-sm btn-outline-secondary"
                                    title="Ver Notícia" target="_blank">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Apagar"
                                        onclick="return confirm('Tem certeza que deseja apagar esta notícia?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="modal fade" id="newsImageModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Imagem da Notícia</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <img id="modalNewsImage" src="" class="img-fluid w-100"
                                        alt="Imagem da notícia">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Paginação -->
                <div class="fixed-pagination d-flex justify-content-center">
                    {{ $news->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <button
                class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center position-fixed bottom-0 end-0 m-3"
                type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample" onclick="window.location.href='{{ route('news.create') }}'">
                <i class="bi bi-file-earmark-arrow-up fs-7"></i>
            </button>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- Import Js Files -->
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/sidebarmenu.js') }}"></script>

    <!-- highlight.js (code view) -->
    <script src="{{ asset('assets/js/highlights/highlight.min.js') }}"></script>
    <script>
        hljs.initHighlightingOnLoad();

        document.querySelectorAll("pre.code-view > code").forEach((codeBlock) => {
            codeBlock.textContent = codeBlock.innerHTML;
        });
    </script>
    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/load_imgModal.js') }}"></script>
</body>

</html>
