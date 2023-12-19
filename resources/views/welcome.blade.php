<x-layout>
    <!-- Hero Section -->
    <div class="container-fluid-front p-3 bg-black text-center text-white position-relative bg-login">
        <div class="row justify-content-center">
            <h1 class="display-2">{{__('ui.welcome')}}</h1>
        </div>

        <div class="row front-page my-4">
            <div class="col-md-6 front-page-text text-start p-3">
                <div class="eyebrow pb-3">Crea il tuo sito web</div>
                <h1>Il leader della progettazione di siti web</h1>
                <p class="sub-text" data-reveal-self="" data-has-intersected="true" data-scrolled-into-view="true">
                    <span class="desktop">
                        Distinguiti online con un website, un negozio online o un portfolio professionale.
                        Con la Programmazione, puoi trasformare qualsiasi idea in una realtà.
                    </span>
                    <span class="mobile">
                        Fatti notare online con un sito web, un negozio online o un portfolio professionali.
                    </span>
                </p>
                <a href="#" class="btn-info btn">
                    <span class="link__text" property="name">Inizia da qui</span>
                </a>
            </div>

            <div class="col-md-6 sub-page">
                <img class="img-sub position-absolute d-flex" src="https://picsum.photos/750/400" alt="Sfondo">
            </div>
        </div>
    </div>

    <!-- Announcements Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center text-light my-4">
                <p class="h2 my-5 fw-bold">{{__('ui.allAnnouncements')}}</p>
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div class="col-12 col-sm-6 col-lg-4 my-4">
                            <div class="card h-100 shadow rounded" style="width: 18rem;">
                                <div id="imageCarousel{{$announcement->id}}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @forelse ($announcement->images as $image)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img src="{{ Storage::url($image->path) }}" class="img-fluid p-3 rounded" alt="Image">
                                            </div>
                                        @empty
                                            <div class="carousel-item active">
                                                <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded" alt="Placeholder Image">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://picsum.photos/id/29/1200/200" class="img-fluid p-3 rounded" alt="Placeholder Image">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://picsum.photos/id/28/1200/200" class="img-fluid p-3 rounded" alt="Placeholder Image">
                                            </div>
                                        @endforelse
                                    </div>
                                    @if (count($announcement->images) > 1)
                                        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel{{$announcement->id}}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel{{$announcement->id}}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    @endif
                                </div>
                                <div class="card-body p-0">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->body}}</p>
                                    <p class="card-text">{{$announcement->price}}</p>
                                    <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary shadow">Visualizza</a>
                                    <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria {{ $announcement->category ? $announcement->category->name : 'N/A' }}</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Pubblicato il {{ $announcement->created_at ? $announcement->created_at->format('d/m/Y') : 'N/A' }} <br> Autore {{ $announcement->user ? $announcement->user->name ?? 'N/A' : 'N/A' }}</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Nessun annuncio disponibile al momento.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>
