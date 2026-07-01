<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <h2 class="display-6 fw-bold text-primary mb-4 text-center">Lavora con noi</h2>
                        <p class="text-muted text-center mb-5">Invia la tua candidatura per unirti al nostro team di moderatori, redattori o amministratori.</p>

                        <form method="POST" action="{{ route('careers.submit') }}">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="role" class="form-label fw-bold">Per quale ruolo vuoi candidarti?</label>
                                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                                    <option value="" disabled selected>Seleziona il ruolo</option>
                                    @if(!Auth::user()->is_admin)
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Amministratore</option>
                                    @endif
                                    @if(!Auth::user()->is_revisor)
                                        <option value="revisor" {{ old('role') == 'revisor' ? 'selected' : '' }}>Revisore</option>
                                    @endif
                                    @if(!Auth::user()->is_writer)
                                        <option value="writer" {{ old('role') == 'writer' ? 'selected' : '' }}>Redattore</option>
                                    @endif
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold">Indirizzo Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', Auth::user()->email) }}" readonly>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="message" class="form-label fw-bold">Messaggio di presentazione</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder="Raccontaci perché saresti perfetto per questo ruolo...">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary py-3 fs-5 fw-bold rounded-3 shadow-sm">Invia Candidatura</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
