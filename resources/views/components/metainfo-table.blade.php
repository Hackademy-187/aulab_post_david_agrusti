<div class="table-responsive rounded-4 shadow-sm mb-5">
    <table class="table table-hover align-middle mb-0 bg-white">
        <thead class="bg-light text-muted">
            <tr>
                <th scope="col" class="border-0 rounded-start-4 ps-4">#</th>
                <th scope="col" class="border-0">Nome {{ ucfirst($metaType) }}</th>
                <th scope="col" class="border-0 text-center">Articoli Collegati</th>
                <th scope="col" class="border-0 text-center">Aggiorna</th>
                <th scope="col" class="border-0 rounded-end-4 text-center pe-4">Cancella</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($metaInfos as $metaInfo)
                <tr>
                    <td class="fw-bold text-muted ps-4">{{ $metaInfo->id }}</td>
                    <td class="fw-semibold text-primary">#{{ $metaInfo->name }}</td>
                    <td class="text-center">
                        <span class="badge bg-secondary rounded-pill">{{ count($metaInfo->articles) }}</span>
                    </td>
                    @if ($metaType == 'tags')
                        <td class="text-center">
                            <form action="{{ route('admin.editTag', ['tag' => $metaInfo]) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $metaInfo->name }}" class="form-control form-control-sm rounded-pill bg-light border-0 shadow-none text-center" style="max-width: 150px;" placeholder="Nuovo nome">
                                <button type="submit" class="btn btn-sm btn-outline-primary rounded-pill shadow-sm" title="Aggiorna Tag">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                        </td>
                        <td class="text-center pe-4">
                            <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill shadow-sm" title="Elimina Tag">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </td>
                    @else
                        <td class="text-center">
                            <form action="{{ route('admin.editCategory', ['category' => $metaInfo]) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $metaInfo->name }}" class="form-control form-control-sm rounded-pill bg-light border-0 shadow-none text-center" style="max-width: 150px;" placeholder="Nuovo nome">
                                <button type="submit" class="btn btn-sm btn-outline-primary rounded-pill shadow-sm" title="Aggiorna Categoria">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                        </td>
                        <td class="text-center pe-4">
                            <form action="{{ route('admin.deleteCategory', ['category' => $metaInfo]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill shadow-sm" title="Elimina Categoria">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center p-5 text-muted">
                        <i class="bi bi-tags display-1 mb-3 opacity-25"></i>
                        <h4 class="fw-normal">Nessun dato presente</h4>
                        <p class="small">Non sono stati ancora creati elementi di questo tipo.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
