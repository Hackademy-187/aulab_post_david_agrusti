<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-primary text-white py-3 text-center rounded-top-3">
                        <h4 class="mb-0 fw-bold">Crea un nuovo Articolo</h4>
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

                        <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Titolo -->
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Titolo</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autofocus placeholder="Inserisci il titolo dell'articolo">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Sottotitolo -->
                            <div class="mb-3">
                                <label for="subtitle" class="form-label fw-semibold">Sottotitolo</label>
                                <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle') }}" required placeholder="Inserisci il sottotitolo dell'articolo">
                                @error('subtitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Categoria -->
                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-semibold">Categoria</label>
                                <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Seleziona una categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Tags -->
                            <div class="mb-3">
                                <label for="tags" class="form-label fw-semibold">Tags</label>
                                <input type="text" name="tags" id="tags" class="form-control @error('tags') is-invalid @enderror" value="{{ old('tags') }}" placeholder="Dividi ogni tag con una virgola">
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
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Corpo dell'articolo -->
                            <div class="mb-4">
                                <label for="body" class="form-label fw-semibold">Corpo dell'Articolo</label>
                                <textarea name="body" id="body" rows="6" class="form-control @error('body') is-invalid @enderror" required placeholder="Scrivi il contenuto dell'articolo qui...">{{ old('body') }}</textarea>
                                @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Bottone di invio -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold">Pubblica Articolo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
