<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <img src="{{ Storage::url($article->image) }}" class="img-fluid rounded-3 mb-4 w-100 shadow-sm" alt="{{ $article->title }}" style="max-height: 500px; object-fit: cover;">
                
                <h1 class="display-3 fw-bold text-primary mb-3">{{ $article->title }}</h1>
                <h3 class="fw-light text-muted mb-4">{{ $article->subtitle }}</h3>
                
                <div class="d-flex align-items-center justify-content-between border-bottom pb-4 mb-5">
                    <div>
                        <p class="mb-0 fw-semibold text-accent">Redatto da <a href="{{ route('article.byUser', $article->user) }}" class="text-decoration-none text-accent">{{ $article->user->name ?? 'N/A' }}</a></p>
                        <p class="mb-0 small text-muted">il {{ $article->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <a href="{{ route('article.byCategory', $article->category) }}" class="text-decoration-none"><span class="badge bg-accent px-3 py-2 rounded-pill fs-6">{{ $article->category->name ?? 'Nessuna Categoria' }}</span></a>
                    </div>
                </div>

                <div class="fs-5 lh-lg mb-5 text-body" style="white-space: pre-wrap;">{{ $article->body }}</div>
                
                <div class="text-center mt-5">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-secondary px-5 py-2 fw-bold">Torna agli articoli</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>