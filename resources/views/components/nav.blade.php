<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav">

    <div class="container-fluid">
        <a class="navbar-brand" href="/">Presto.it</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('announcements.index')}}">Annunci</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category )
                            <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <x-_locale lang='it' nation='it' />
                </li>
                <li class="nav-item">
                    <x-_locale lang='en' nation='gb' />
                </li>
                <li class="nav-item">
                    <x-_locale lang='es' nation='es' />
                </li>
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('announcements.create')}}">Nuovo Annuncio</a>
                    </li>
                    <li class="nav-item dropdown ml-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->is_revisor)
                                <li><a class="dropdown-item" aria-current="page" href="{{route('revisor.index')}}">Zona revisore
                                    <span class="position-absolute top0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{App\Models\Announcement::toBeRevisionedCount()}}
                                        <span class="visually-hidden">
                                            unread messages
                                        </span>
                                    </span>
                                </a></li>
                            @endif
                            <li><a class="dropdown-item" href="#">Profilo</a></li>
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