<div class="table-responsive rounded-4 shadow-sm mb-5">
    <table class="table table-hover align-middle mb-0 bg-white">
        <thead class="bg-light text-muted">
            <tr>
                <th scope="col" class="border-0 rounded-start-4 ps-4">#</th>
                <th scope="col" class="border-0">Titolo</th>
                <th scope="col" class="border-0">Sottotitolo</th>
                <th scope="col" class="border-0">Categoria</th>
                <th scope="col" class="border-0">Tags</th>
                <th scope="col" class="border-0">Inserito il</th>
                <th scope="col" class="border-0 rounded-end-4 text-center pe-4">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td class="fw-bold text-muted ps-4">{{ $article->id }}</td>
                    <td class="fw-semibold text-primary">{{ $article->title }}</td>
                    <td class="text-muted">{{ Str::limit($article->subtitle, 20) }}</td>
                    <td>
                        @if($article->category)
                            <span class="badge bg-secondary rounded-pill">{{ $article->category->name }}</span>
                        @else
                            <span class="text-muted small">Nessuna categoria</span>
                        @endif
                    </td>
                    <td>
                        @foreach ($article->tags as $tag)
                            <span class="small text-muted me-1">#{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $article->created_at->format('d/m/Y') }}</td>
                    <td class="text-center pe-4">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('article.show', $article) }}" class="btn btn-sm btn-outline-secondary rounded-pill shadow-sm" title="Leggi l'articolo">
                                <i class="bi bi-eye"></i> Leggi
                            </a>
                            <a href="{{ route('article.edit', compact('article')) }}" class="btn btn-sm btn-outline-warning rounded-pill shadow-sm" title="Modifica l'articolo">
                                <i class="bi bi-pencil-square"></i> Modifica
                            </a>
                            <form action="{{ route('article.destroy', compact('article')) }}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo? L\'azione è irreversibile.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill shadow-sm" title="Elimina l'articolo">
                                    <i class="bi bi-trash3-fill"></i> Elimina
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center p-5 text-muted">
                        <i class="bi bi-journal-text display-1 mb-3 opacity-25"></i>
                        <h4 class="fw-normal">Nessun articolo trovato</h4>
                        <p class="small">Non ci sono articoli in questa sezione.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
