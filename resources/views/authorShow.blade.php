<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1 text-capitalize">Annunci di: {{ $user->name }}</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            @forelse ($announcements as $announcement)
                <div class="col-12 col-sm-6 col-lg-4 my-4">
                    <div class="card h-100 shadow rounded">
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
                        <div class="card-body p-3">
                            <h5 class="card-title">{{$announcement->title}}</h5>
                            <p class="card-text">{{$announcement->body}}</p>
                            <p class="card-text">{{$announcement->price}}</p>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <p class="mb-0">
                                Redatto il {{ $announcement->created_at->format('d/m/Y') }}<br>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Nessun annuncio disponibile per questo utente.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
