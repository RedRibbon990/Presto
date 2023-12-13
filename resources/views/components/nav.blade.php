<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav">

    <div class="container-fluid">
        <a class="navbar-brand" href="/">Presto.it</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('announcements.create')}}">Nuovo Annuncio</a>
                </li>
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">1</a></li>
                            <li><a class="dropdown-item" href="#">2</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a>
                            <form method="POST" action="{{ route('logout') }}" id="form-logout" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>

        <form  class="p-2">
            <input type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
            <button type="submit" class="btn btn-outline-info">Cerca</button>
        </form>
    </div>
</nav>