<x-layout>
    <!-- Header with Stats -->
    <div class="container-fluid p-5 bg-dark text-white text-center rounded-bottom-4 shadow-sm mb-5">
        <h1 class="display-3 fw-bold mb-4">Pannello di Controllo</h1>
        <p class="lead text-white-50 mb-5">Benvenuto, Amministratore {{ Auth::user()->name }}. Gestisci le richieste di ruolo e lo staff attivo.</p>
        
        <div class="row justify-content-center g-4">
            <!-- Card Admin -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card bg-primary text-white border-0 shadow-lg h-100 rounded-4">
                    <div class="card-body py-4">
                        <i class="bi bi-key-fill display-4 mb-3 opacity-75"></i>
                        <h2 class="display-5 fw-bold">{{ count($adminRequests) }}</h2>
                        <h5 class="card-title fw-normal">Richieste Admin</h5>
                    </div>
                </div>
            </div>
            <!-- Card Revisori -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card bg-success text-white border-0 shadow-lg h-100 rounded-4">
                    <div class="card-body py-4">
                        <i class="bi bi-eye-fill display-4 mb-3 opacity-75"></i>
                        <h2 class="display-5 fw-bold">{{ count($revisorRequests) }}</h2>
                        <h5 class="card-title fw-normal">Richieste Revisori</h5>
                    </div>
                </div>
            </div>
            <!-- Card Redattori -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card bg-warning text-dark border-0 shadow-lg h-100 rounded-4">
                    <div class="card-body py-4">
                        <i class="bi bi-pen-fill display-4 mb-3 opacity-75"></i>
                        <h2 class="display-5 fw-bold">{{ count($writerRequests) }}</h2>
                        <h5 class="card-title fw-normal">Richieste Redattori</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Success -->
    @if (session('message'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-4 text-center mb-4" role="alert">
                <strong>Operazione completata!</strong> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <div class="container my-5">
        
        <!-- Search Bar -->
        <div class="row justify-content-end mb-4">
            <div class="col-12 col-md-4">
                <input type="text" id="tableSearch" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="🔍 Cerca utente per nome o email...">
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-white pt-4 pb-0 border-0">
                <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-light rounded-pill shadow-sm" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-pill fw-bold" id="pills-admin-tab" data-bs-toggle="pill" data-bs-target="#pills-admin" type="button" role="tab">Amministratori</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill fw-bold" id="pills-revisor-tab" data-bs-toggle="pill" data-bs-target="#pills-revisor" type="button" role="tab">Revisori</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill fw-bold" id="pills-writer-tab" data-bs-toggle="pill" data-bs-target="#pills-writer" type="button" role="tab">Redattori</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill fw-bold text-danger" id="pills-staff-tab" data-bs-toggle="pill" data-bs-target="#pills-staff" type="button" role="tab">Staff Attivo</button>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content" id="pills-tabContent">
                    <!-- Tab Admin -->
                    <div class="tab-pane fade show active" id="pills-admin" role="tabpanel">
                        <h4 class="mb-4 text-primary">Richieste per Amministratore</h4>
                        <x-requests-table :roleRequests="$adminRequests" role="amministratore"/>
                    </div>
                    
                    <!-- Tab Revisori -->
                    <div class="tab-pane fade" id="pills-revisor" role="tabpanel">
                        <h4 class="mb-4 text-success">Richieste per Revisore</h4>
                        <x-requests-table :roleRequests="$revisorRequests" role="revisore"/>
                    </div>
                    
                    <!-- Tab Redattori -->
                    <div class="tab-pane fade" id="pills-writer" role="tabpanel">
                        <h4 class="mb-4 text-warning">Richieste per Redattore</h4>
                        <x-requests-table :roleRequests="$writerRequests" role="redattore"/>
                    </div>

                    <!-- Tab Staff Attivo -->
                    <div class="tab-pane fade" id="pills-staff" role="tabpanel">
                        <h4 class="mb-4 text-danger">Gestione Staff Attivo</h4>
                        <x-staff-table :activeStaff="$activeStaff"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gestione Tags -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Tutti i tags</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags"/>
            </div>
        </div>
    </div>

    <!-- Gestione Categorie -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                    <h2 class="mb-0">Tutte le categorie</h2>
                    <form action="{{route('admin.storeCategory')}}" method="POST" class="d-flex w-100" style="max-width: 400px;">
                        @csrf
                        <input type="text" name="name" class="form-control rounded-pill me-2 shadow-sm" placeholder="Nuova categoria" required>
                        <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4">Crea</button>
                    </form>
                </div>
                <x-metainfo-table :metaInfos="$categories" metaType="categorie"/>
            </div>
        </div>
    </div>

    <!-- Script per filtro ricerca -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('tableSearch');
            
            searchInput.addEventListener('keyup', function() {
                const value = this.value.toLowerCase();
                // Trova tutte le righe delle tabelle dentro ai tab
                const rows = document.querySelectorAll('.tab-pane.active tbody tr');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if(text.indexOf(value) > -1) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Reset della ricerca quando si cambia tab
            const tabButtons = document.querySelectorAll('button[data-bs-toggle="pill"]');
            tabButtons.forEach(button => {
                button.addEventListener('shown.bs.tab', function (e) {
                    searchInput.value = '';
                    const allRows = document.querySelectorAll('tbody tr');
                    allRows.forEach(row => row.style.display = '');
                });
            });
        });
    </script>
</x-layout>
