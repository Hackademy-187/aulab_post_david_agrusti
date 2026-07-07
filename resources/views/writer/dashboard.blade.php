<x-layout>
    <div class="container-fluid p-5 bg-dark text-white text-center rounded-bottom-4 shadow-sm mb-5">
        <h1 class="display-3 fw-bold mb-4">Pannello di Controllo Redattore</h1>
        <p class="lead text-white-50 mb-5">Bentornato, Redattore {{Auth::user()->name}}.</p>
    </div>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-4">Articoli in attesa di revisione</h2>
                <x-writer-articles-table :articles="$unrevisionedArticles"/>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-4">Articoli pubblicati</h2>
                <x-writer-articles-table :articles="$acceptedArticles"/>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-4">Articoli respinti</h2>
                <x-writer-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>
</x-layout>
