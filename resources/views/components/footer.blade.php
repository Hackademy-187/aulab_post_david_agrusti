<footer class="navbar-custom text-center text-lg-start py-3 mt-auto">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">
    <p class="col-md-4 mb-0 text-white-50">&copy; {{ date('Y') }} The Aulab Post</p>

    <a href="{{ route('homepage') }}" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
      <span class="fs-5 fw-bold font-playfair text-white">The Aulab Post</span>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link px-2 text-white-50 hover-white">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-white-50 hover-white">Articoli</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-white-50 hover-white">Contatti</a></li>
    </ul>
  </div>
</footer>
