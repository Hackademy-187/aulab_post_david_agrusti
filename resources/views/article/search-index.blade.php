<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold text-primary text-center mb-4">Risultati della ricerca</h1>
                <p class="lead text-muted text-center mb-5">
                    Hai cercato: <span class="fw-semibold text-accent">"{{ $query }}"</span>
                </p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            @forelse($articles as $article)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-primary">{{ $article->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $article->subtitle }}</h6>
                            
                            <p class="small text-muted mb-1 mt-3">
                                Categoria: 
                                @if($article->category)
                                    <a href="{{ route('article.byCategory', $article->category) }}" class="text-decoration-none fw-semibold text-accent">
                                        {{ $article->category->name }}
                                    </a>
                                @else
                                    <span class="text-muted">Nessuna categoria</span>
                                @endif
                            </p>
                            
                            <p class="small text-muted my-0">
                                @foreach ($article->tags as $tag)
                                    #{{ $tag->name }}
                                @endforeach
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
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-search display-1 text-muted mb-4 opacity-50"></i>
                    <h3 class="fw-bold text-secondary">Nessun articolo corrisponde ai criteri di ricerca</h3>
                    <p class="text-muted small">Prova a cercare qualcos'altro o verifica lo spelling della parola chiave.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
