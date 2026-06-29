<x-layout>
    <div class="container my-5">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg bg-body-tertiary">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis">Benvenuto su The Aulab Post</h1>
                <p class="lead mt-3">Il portale definitivo per le notizie dei programmatori. Leggi gli articoli scritti dalla community, scrivi le tue idee ed esplora le ultime novità del mondo tech.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3 mt-4">
                    <a href="#" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Leggi gli Articoli</a>
                    <a href="#" class="btn btn-outline-secondary btn-lg px-4">Inserisci Articolo</a>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg rounded-3">
                <img class="rounded-lg-3" src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=600&q=80" alt="News Image" width="720">
            </div>
        </div>
    </div>
</x-layout>
