<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('homepage') }}">The Aulab Post</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('article.index') }}">Tutti gli Articoli</a>
        </li>
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('article.create') }}">Crea Articolo</a>
          </li>
        @endauth
      </ul>
      
      <!-- Search Form -->
      <form action="{{ route('article.search') }}" method="GET" class="d-flex me-auto ms-lg-3 my-2 my-lg-0" role="search">
          <input class="form-control rounded-pill me-2" type="search" name="query" placeholder="Cerca articoli..." aria-label="Search">
          <button class="btn btn-outline-primary rounded-pill px-3" type="submit">Cerca</button>
      </form>
      
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="/login">Accedi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Registrati</a>
          </li>
        @endguest

        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao, {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
              <li><a class="dropdown-item" href="#">Il mio Profilo</a></li>
              @if (Auth::user()->is_admin)
                  <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
              @endif
              @if (Auth::user()->is_revisor)
                  <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard Revisore</a></li>
              @endif
              <li><hr class="dropdown-divider"></li>
              <li>
                <form id="logout-form" action="/logout" method="POST" class="d-none">
                  @csrf
                </form>
                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>
              </li>
            </ul>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>