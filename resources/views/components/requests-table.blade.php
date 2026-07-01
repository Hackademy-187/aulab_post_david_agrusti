<div class="table-responsive">
    @if(count($roleRequests) > 0)
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead class="bg-light text-muted">
                <tr>
                    <th scope="col" class="border-0 rounded-start-4">#</th>
                    <th scope="col" class="border-0">Utente</th>
                    <th scope="col" class="border-0">Email</th>
                    <th scope="col" class="border-0 rounded-end-4 text-center">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roleRequests as $user)
                    <tr>
                        <td class="fw-bold">{{ $user->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="fw-semibold">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Pulsante Attiva -->
                                @switch($role)
                                    @case('amministratore')
                                        <form action="{{ route('admin.setAdmin', compact('user')) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                                <i class="bi bi-check2-circle me-1"></i> Attiva
                                            </button>
                                        </form>
                                        @break
                                    @case('revisore')
                                        <form action="{{ route('admin.setRevisor', compact('user')) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm">
                                                <i class="bi bi-check2-circle me-1"></i> Attiva
                                            </button>
                                        </form>
                                        @break
                                    @case('redattore')
                                        <form action="{{ route('admin.setWriter', compact('user')) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning rounded-pill px-4 shadow-sm">
                                                <i class="bi bi-check2-circle me-1"></i> Attiva
                                            </button>
                                        </form>
                                        @break
                                @endswitch

                                <!-- Pulsante Rifiuta apre il Modal -->
                                <button type="button" class="btn btn-outline-danger rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $user->id }}-{{ $role }}">
                                    <i class="bi bi-x-circle me-1"></i> Rifiuta
                                </button>
                            </div>

                            <!-- Modal Rifiuto per l'utente corrente -->
                            <div class="modal fade" id="rejectModal-{{ $user->id }}-{{ $role }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content rounded-4 border-0 shadow">
                                        <div class="modal-header border-0 bg-danger text-white rounded-top-4">
                                            <h5 class="modal-title">Rifiuta Candidatura</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start p-4">
                                            <p>Stai rifiutando la candidatura di <strong>{{ $user->name }}</strong> per il ruolo di <strong>{{ ucfirst($role) }}</strong>.</p>
                                            
                                            <!-- Form di rifiuto -->
                                            @php
                                                $rejectRoute = '';
                                                if($role == 'amministratore') $rejectRoute = route('admin.rejectAdmin', compact('user'));
                                                if($role == 'revisore') $rejectRoute = route('admin.rejectRevisor', compact('user'));
                                                if($role == 'redattore') $rejectRoute = route('admin.rejectWriter', compact('user'));
                                            @endphp
                                            
                                            <form action="{{ $rejectRoute }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                
                                                <div class="mb-3">
                                                    <label for="reason-{{ $user->id }}" class="form-label text-muted small">Motivazione (Opzionale): verrà inclusa nella mail automatica</label>
                                                    <textarea class="form-control bg-light border-0" id="reason-{{ $user->id }}" name="reason" rows="3" placeholder="Es. In questo momento non abbiamo posizioni aperte..."></textarea>
                                                </div>

                                                <div class="d-flex justify-content-end gap-2 mt-4">
                                                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Annulla</button>
                                                    <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">
                                                        <i class="bi bi-send-fill me-1"></i> Conferma Rifiuto
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fine Modal -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-center p-5 text-muted">
            <i class="bi bi-inbox display-1 mb-3 opacity-25"></i>
            <h4 class="fw-normal">Nessuna richiesta in sospeso</h4>
            <p class="small">Non ci sono candidature per il ruolo di {{ ucfirst($role) }}.</p>
        </div>
    @endif
</div>
