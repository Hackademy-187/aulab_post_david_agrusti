<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold text-primary text-center mb-5">Articoli della categoria: <span class="text-accent">{{ $category->name }}</span></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($articles as $article)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <x-article-card :article="$article" />
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('article.index') }}" class="btn btn-outline-secondary px-5 py-2 fw-bold">Torna a tutti gli articoli</a>
            </div>
        </div>
    </div>
</x-layout>
