<nav class="navbar navbar-expand-lg navbar-light shadow animate__animated animate__slideInDown">
  <a class="navbar-brand" href="{{ route('home') }}">Pemetaan Daerah Rawan Longsor</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      @guest
        <a class="btn btn-default px-3 rounded-pill btn-prim" href="{{ route('dashboard') }}">Masuk</a>
      @endguest
      @auth
        @if (auth()->user()->level == 'ADMIN')
          <a class="btn btn-default px-3 rounded-pill btn-prim" href="{{ route('dashboard') }}">
            <i class="fal fa-user-cog fa-sm"></i>
            Admin
          </a>
        @else
        <form action="{{ url('logout') }}" method="POST">
          @csrf
          <button class="btn btn-default px-3 rounded-pill btn-prim" type="submit">
            <i data-feather="log-out"></i>
            Keluar
          </button>
        </form>
        @endif
      @endauth
    </div>
  </div>
</nav>