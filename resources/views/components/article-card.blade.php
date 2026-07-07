<div class="card shadow-sm h-100">
    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title fw-bold text-primary">{{ $article->title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $article->subtitle }}</h6>
        @if ($article->category)
            <p class="small text-muted mb-1 mt-3">
                Categoria: <a href="{{ route('article.byCategory', $article->category) }}" class="text-decoration-none fw-semibold text-accent">{{ $article->category->name }}</a>
            </p>
        @else
            <p class="small text-muted mb-1 mt-3">Nessuna categoria</p>
        @endif
        <p class="small text-muted my-0">
            @foreach ($article->tags as $tag)
                #{{ $tag->name }}
            @endforeach
        </p>
        <p class="card-subtitle text-muted fst-italic small">tempo di lettura {{ $article->readDuration() }} min</p>
        <p class="small text-muted mb-3 mt-2">
            Redatto da <a href="{{ route('article.byUser', $article->user) }}" class="text-decoration-none fw-semibold text-accent">{{ $article->user->name ?? 'N/A' }}</a> il {{ $article->created_at->format('d/m/Y') }}
        </p>
        <div class="mt-auto">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-outline-secondary w-100">Leggi</a>
        </div>
    </div>
</div>
