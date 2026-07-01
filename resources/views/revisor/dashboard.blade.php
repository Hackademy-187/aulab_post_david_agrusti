<x-layout>
    <!-- Header with Stats -->
    <div class="container-fluid p-5 bg-dark text-white text-center rounded-bottom-4 shadow-sm mb-5">
        <h1 class="display-3 fw-bold mb-4">Dashboard Revisore</h1>
        <p class="lead text-white-50 mb-5">Benvenuto, Revisore {{ Auth::user()->name }}. Qui puoi gestire gli articoli da pubblicare sulla piattaforma.</p>
        
        <div class="row justify-content-center g-4">
            <!-- Card Da Revisionare -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card bg-primary text-white border-0 shadow-lg h-100 rounded-4">
                    <div class="card-body py-4">
                        <i class="bi bi-file-earmark-text-fill display-4 mb-3 opacity-75"></i>
                        <h2 class="display-5 fw-bold">{{ count($unrevisedArticles) }}</h2>
                        <h5 class="card-title fw-normal">Da Revisionare</h5>
                    </div>
                </div>
            </div>
            <!-- Card Accettati -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card bg-success text-white border-0 shadow-lg h-100 rounded-4">
                    <div class="card-body py-4">
                        <i class="bi bi-check-circle-fill display-4 mb-3 opacity-75"></i>
                        <h2 class="display-5 fw-bold">{{ count($acceptedArticles) }}</h2>
                        <h5 class="card-title fw-normal">Articoli Pubblicati</h5>
                    </div>
                </div>
            </div>
            <!-- Card Rifiutati -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card bg-danger text-white border-0 shadow-lg h-100 rounded-4">
                    <div class="card-body py-4">
                        <i class="bi bi-x-circle-fill display-4 mb-3 opacity-75"></i>
                        <h2 class="display-5 fw-bold">{{ count($rejectedArticles) }}</h2>
                        <h5 class="card-title fw-normal">Articoli Rifiutati</h5>
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
                <input type="text" id="tableSearch" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="🔍 Cerca articolo per titolo o autore...">
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-white pt-4 pb-0 border-0">
                <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-light rounded-pill shadow-sm" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-pill fw-bold" id="pills-unrevised-tab" data-bs-toggle="pill" data-bs-target="#pills-unrevised" type="button" role="tab">Da Revisionare</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill fw-bold text-success" id="pills-accepted-tab" data-bs-toggle="pill" data-bs-target="#pills-accepted" type="button" role="tab">Pubblicati</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill fw-bold text-danger" id="pills-rejected-tab" data-bs-toggle="pill" data-bs-target="#pills-rejected" type="button" role="tab">Rifiutati</button>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content" id="pills-tabContent">
                    <!-- Tab Da Revisionare -->
                    <div class="tab-pane fade show active" id="pills-unrevised" role="tabpanel">
                        <h4 class="mb-4 text-primary">Articoli In Attesa di Revisione</h4>
                        <x-articles-table :articles="$unrevisedArticles"/>
                    </div>
                    
                    <!-- Tab Accettati -->
                    <div class="tab-pane fade" id="pills-accepted" role="tabpanel">
                        <h4 class="mb-4 text-success">Articoli Accettati (Pubblicati)</h4>
                        <x-articles-table :articles="$acceptedArticles"/>
                    </div>
                    
                    <!-- Tab Rifiutati -->
                    <div class="tab-pane fade" id="pills-rejected" role="tabpanel">
                        <h4 class="mb-4 text-danger">Articoli Rifiutati</h4>
                        <x-articles-table :articles="$rejectedArticles"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script per filtro ricerca -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('tableSearch');
            
            searchInput.addEventListener('keyup', function() {
                const value = this.value.toLowerCase();
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
