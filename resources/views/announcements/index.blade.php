<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-light">
                <h1>Presto.it</h1>
                <p class="h2 my-2 fw-bold">{{__('ui.allAnnouncements')}}</p>
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
                <div class="d-flex justify-content-center">
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
