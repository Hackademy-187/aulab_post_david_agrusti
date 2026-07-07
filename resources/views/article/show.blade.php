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
                    <div class="text-end">
                        @if ($article->category)
                            <a href="{{ route('article.byCategory', $article->category) }}" class="text-decoration-none"><span class="badge bg-accent px-3 py-2 rounded-pill fs-6">{{ $article->category->name }}</span></a>
                        @else
                            <span class="text-muted">Nessuna categoria</span>
                        @endif
                        <p class="small text-muted my-0 mt-2">
                            @foreach ($article->tags as $tag)
                                #{{ $tag->name }}
                            @endforeach
                        </p>
                    </div>
                </div>

                <div class="fs-5 lh-lg mb-5 text-body" style="white-space: pre-wrap;">{{ $article->body }}</div>
                
                @if (Auth::user() && Auth::user()->is_revisor && is_null($article->is_accepted))
                    <div class="d-flex justify-content-center gap-3 mb-5 border-top pt-4">
                        <form action="{{ route('revisor.acceptArticle', compact('article')) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success rounded-pill px-4 shadow-sm fw-bold">
                                <i class="bi bi-check-circle me-2"></i>Accetta Articolo
                            </button>
                        </form>
                        <form action="{{ route('revisor.rejectArticle', compact('article')) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger rounded-pill px-4 shadow-sm fw-bold">
                                <i class="bi bi-x-circle me-2"></i>Rifiuta Articolo
                            </button>
                        </form>
                    </div>
                @endif
                
                @if (Auth::user() && Auth::user()->is_revisor && !is_null($article->is_accepted))
                    <div class="d-flex justify-content-center mb-5 border-top pt-4">
                        <form action="{{ route('revisor.undoArticle', compact('article')) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-warning rounded-pill px-4 shadow-sm fw-bold text-dark">
                                <i class="bi bi-arrow-counterclockwise me-2"></i>Riporta in revisione
                            </button>
                        </form>
                    </div>
                @endif
                
                @if (Auth::user() && Auth::user()->id == $article->user_id)
                    <div class="d-flex justify-content-center mb-5 border-top pt-4">
                        <form action="{{ route('article.destroy', compact('article')) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare definitivamente questo articolo? L\'azione è irreversibile.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-4 shadow-sm fw-bold">
                                <i class="bi bi-trash3-fill me-2"></i>Elimina Articolo
                            </button>
                        </form>
                    </div>
                @endif
                
                <div class="text-center mt-5">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-secondary px-5 py-2 fw-bold">Torna agli articoli</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>