<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.backoffice.gallery.head')

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

                <div class="gallery-grid">
                    @foreach ($gallery as $item)
                        <div class="gallery-card">
                            <div class="gallery-card-header">
                                <img class="gallery-image" src="{{ asset('storage/images/gallery/' . $item->photo) }}"
                                    style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galleryImageModal"
                                    data-image="{{ asset('storage/images/gallery/' . $item->photo) }}">
                            </div>
                            <div class="gallery-card-body">
                                <h3 class="gallery-title">{{ Str::limit($item->title ?? 'Sem título', 50) }}</h3>
                                {{-- Se quiseres, podes mostrar mais dados aqui --}}
                            </div>
                            <div class="gallery-card-footer" style="justify-content: center;">
                                <a href="{{ route('gallery.show', $item->id) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Ver detalhes">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('gallery.destroy', $item->id) }}" method="POST"
                                    class="d-inline {{ auth()->user()->hasRole('aluno') ? 'd-none' : '' }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Apagar"
                                        onclick="return confirm('Tem certeza que deseja apagar esta imagem?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <!-- Modal único para todas as imagens -->
                    <div class="modal fade" id="galleryImageModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Imagem da Galeria</h5>
                                    <button type="button" class="btn-close ms-2" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <img id="modalGalleryImage" src="" class="img-fluid w-100"
                                        alt="Imagem da galeria">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <button
                    class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center position-fixed bottom-0 end-0 m-3 {{ auth()->user()->hasRole('aluno') ? 'd-none' : '' }}"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                    aria-controls="offcanvasExample" onclick="window.location.href='{{ route('gallery.create') }}'">
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
        <script src="{{ asset('assets/js/load_imgGalleryModal.js') }}"></script>
</body>

</html>
