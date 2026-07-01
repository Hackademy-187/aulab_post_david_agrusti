<div class="table-responsive">
    @if(count($articles) > 0)
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead class="bg-light text-muted">
                <tr>
                    <th scope="col" class="border-0 rounded-start-4">#</th>
                    <th scope="col" class="border-0">Titolo</th>
                    <th scope="col" class="border-0">Autore</th>
                    <th scope="col" class="border-0">Data Scrittura</th>
                    <th scope="col" class="border-0 rounded-end-4 text-center">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td class="fw-bold">{{ $article->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!-- Se abbiamo un'immagine, la mostriamo come miniatura, altrimenti un'icona -->
                                @if($article->image)
                                    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="rounded-3 me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-card-text"></i>
                                    </div>
                                @endif
                                
                                <div>
                                    <span class="fw-semibold d-block text-truncate" style="max-width: 200px;">{{ $article->title }}</span>
                                    <small class="text-muted text-truncate d-block" style="max-width: 200px;">{{ $article->subtitle }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $article->user->name ?? 'Utente Sconosciuto' }}</td>
                        <td>{{ $article->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                @if (is_null($article->is_accepted))
                                    <!-- Se l'articolo è da revisionare -->
                                    <a href="{{ route('article.show', compact('article')) }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                                        <i class="bi bi-eye me-1"></i> Leggi e Valuta
                                    </a>
                                @else
                                    <!-- Se l'articolo è stato già accettato o rifiutato -->
                                    <form action="{{ route('revisor.undoArticle', compact('article')) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
                                            <i class="bi bi-arrow-counterclockwise me-1"></i> Riporta in revisione
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-center p-5 text-muted">
            <i class="bi bi-journal-text display-1 mb-3 opacity-25"></i>
            <h4 class="fw-normal">Nessun articolo trovato</h4>
            <p class="small">Non ci sono articoli in questa categoria al momento.</p>
        </div>
    @endif
</div>
