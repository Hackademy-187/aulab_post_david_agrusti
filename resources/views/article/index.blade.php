<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold text-primary text-center mb-5">Tutti gli Articoli</h1>
            </div>
        </div>
        <div class="row justify-content-center">
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
