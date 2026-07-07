<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold text-primary text-center mb-5">Tutti gli Articoli</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($articles as $article)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <x-article-card :article="$article" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
