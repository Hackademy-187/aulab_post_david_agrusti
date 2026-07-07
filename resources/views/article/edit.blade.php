<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-warning text-dark py-3 text-center rounded-top-3">
                        <h4 class="mb-0 fw-bold">Modifica l'Articolo</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('article.update', compact('article')) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Titolo -->
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Titolo</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $article->title }}" required autofocus>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Sottotitolo -->
                            <div class="mb-3">
                                <label for="subtitle" class="form-label fw-semibold">Sottotitolo</label>
                                <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ $article->subtitle }}" required>
                                @error('subtitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Categoria -->
                            <div class="mb-3">
                                <label for="category" class="form-label fw-semibold">Categoria</label>
                                <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
                                    <option value="" disabled>Seleziona una categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Tags -->
                            <div class="mb-3">
                                <label for="tags" class="form-label fw-semibold">Tags</label>
                                <input type="text" name="tags" id="tags" class="form-control @error('tags') is-invalid @enderror" value="{{ $article->tags->implode('name', ', ') }}">
                                <span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
                                @error('tags')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Immagine -->
                            <div class="mb-3">
                                <label for="image" class="form-label fw-semibold">Immagine Copertina</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                <div class="mt-3">
                                    <span class="d-block fw-semibold mb-2">Immagine precedente:</span>
                                    <img src="{{ Storage::url($article->image) }}" alt="Anteprima immagine" class="img-fluid rounded w-50 shadow-sm">
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Corpo dell'articolo -->
                            <div class="mb-4">
                                <label for="body" class="form-label fw-semibold">Corpo dell'Articolo</label>
                                <textarea name="body" id="body" rows="6" class="form-control @error('body') is-invalid @enderror" required>{{ $article->body }}</textarea>
                                @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Bottone di invio -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-warning btn-lg fw-bold">Aggiorna Articolo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
