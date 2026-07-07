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
                    <x-article-card :article="$article" />
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
