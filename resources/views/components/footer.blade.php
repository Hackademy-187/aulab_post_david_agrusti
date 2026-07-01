<footer class="navbar-custom text-white pt-5 pb-4 mt-auto border-top border-secondary border-opacity-25">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">
            
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold font-playfair text-white">The Aulab Post</h5>
                <p class="text-white-50">
                    Il tuo portale di informazione tech. Resta aggiornato sulle ultime novità, tutorial e trend del mondo dello sviluppo software.
                </p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold text-white fs-6">Esplora</h5>
                <p>
                    <a href="{{ route('homepage') }}" class="text-white-50 text-decoration-none hover-white">Home</a>
                </p>
                <p>
                    <a href="{{ route('article.index') }}" class="text-white-50 text-decoration-none hover-white">Tutti gli Articoli</a>
                </p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold text-white fs-6">Collabora con noi</h5>
                <p class="text-white-50 mb-4 small">
                    Vuoi entrare a far parte della nostra redazione? Scopri i ruoli disponibili.
                </p>
                <a href="{{ route('careers') }}" class="btn btn-outline-light rounded-pill px-4 fw-bold btn-sm">Lavora con noi</a>
            </div>

        </div>

        <hr class="mb-4 mt-5 text-white-50 opacity-25">

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <p class="text-white-50 mb-0 small">
                    &copy; {{ date('Y') }} Tutti i diritti riservati - 
                    <strong class="text-white font-playfair">The Aulab Post</strong>
                </p>
            </div>
        </div>
    </div>
</footer>
