<x-layout>
    <div class="container my-5">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mt-3 shadow-sm" role="alert">
                <div>
                    <strong>Perfetto!</strong> {{ session('message') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg bg-white">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 text-primary">Benvenuto su The Aulab Post</h1>
                <p class="lead mt-3">Il portale definitivo per le notizie dei programmatori. Leggi gli articoli scritti dalla community, scrivi le tue idee ed esplora le ultime novità del mondo tech.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3 mt-4">
                    <a href="{{ route('homepage') }}" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Leggi gli Articoli</a>
                    <a href="{{ route('article.create') }}" class="btn btn-outline-secondary btn-lg px-4">Inserisci Articolo</a>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg rounded-3">
                <img class="rounded-lg-3 img-fluid" style="object-fit: cover; width: 100%; height: 100%; max-height: 400px;" src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=600&q=80" alt="News Image" width="720">
            </div>
        </div>
        
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <h2 class="display-6 fw-bold mb-4 text-center">Ultimi Articoli</h2>
            </div>
            @foreach($articles as $article)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-primary">{{ $article->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $article->subtitle }}</h6>
                            <p class="small text-muted mb-1 mt-3">
                                Categoria: <a href="{{ route('article.byCategory', $article->category) }}" class="text-decoration-none fw-semibold text-accent">{{ $article->category->name ?? 'N/A' }}</a>
                            </p>
                            <p class="small text-muted mb-3">
                                Redatto da <a href="{{ route('article.byUser', $article->user) }}" class="text-decoration-none fw-semibold text-accent">{{ $article->user->name ?? 'N/A' }}</a> il {{ $article->created_at->format('d/m/Y') }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ route('article.show', compact('article')) }}" class="btn btn-outline-secondary w-100">Leggi</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
