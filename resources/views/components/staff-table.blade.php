<div class="table-responsive">
    @if(count($activeStaff) > 0)
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead class="bg-light text-muted">
                <tr>
                    <th scope="col" class="border-0 rounded-start-4">#</th>
                    <th scope="col" class="border-0">Membro Staff</th>
                    <th scope="col" class="border-0">Email</th>
                    <th scope="col" class="border-0">Ruoli Attivi</th>
                    <th scope="col" class="border-0 rounded-end-4 text-center">Azioni di Revoca</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activeStaff as $user)
                    <tr>
                        <td class="fw-bold">{{ $user->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="fw-semibold">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="d-flex gap-2 flex-wrap">
                                @if($user->is_admin)
                                    <span class="badge bg-primary rounded-pill py-2 px-3 shadow-sm"><i class="bi bi-key-fill me-1"></i> Admin</span>
                                @endif
                                @if($user->is_revisor)
                                    <span class="badge bg-success rounded-pill py-2 px-3 shadow-sm"><i class="bi bi-eye-fill me-1"></i> Revisore</span>
                                @endif
                                @if($user->is_writer)
                                    <span class="badge bg-warning text-dark rounded-pill py-2 px-3 shadow-sm"><i class="bi bi-pen-fill me-1"></i> Redattore</span>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                @if($user->is_admin && $user->id != Auth::user()->id)
                                    <form action="{{ route('admin.revokeAdmin', compact('user')) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-pill shadow-sm" onclick="return confirm('Sicuro di voler revocare il ruolo di Admin?')">Revoca Admin</button>
                                    </form>
                                @endif
                                @if($user->is_revisor)
                                    <form action="{{ route('admin.revokeRevisor', compact('user')) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-success rounded-pill shadow-sm" onclick="return confirm('Sicuro di voler revocare il ruolo di Revisore?')">Revoca Revisore</button>
                                    </form>
                                @endif
                                @if($user->is_writer)
                                    <form action="{{ route('admin.revokeWriter', compact('user')) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-warning rounded-pill shadow-sm" onclick="return confirm('Sicuro di voler revocare il ruolo di Redattore?')">Revoca Redattore</button>
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
            <i class="bi bi-people display-1 mb-3 opacity-25"></i>
            <h4 class="fw-normal">Nessun membro nello staff</h4>
            <p class="small">Al momento non ci sono utenti con ruoli attivi sulla piattaforma.</p>
        </div>
    @endif
</div>
