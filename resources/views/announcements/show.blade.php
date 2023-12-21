<x-layout>
    <div class="container-fluid bg-gradient text-light shadow mb-4">
        <div class="row">
            <div class="col-12 text-center py-4">
                <p class="h6 m-0">Titolo</p>
                <h1 class="display-2">{{ $announcement->title }}</h1>
            </div>
        </div>
    </div>

    <div class="container text-light">
        <div class="row">
            <div class="col-12">
                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @forelse ($announcement->images ?? [] as $image)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ Storage::url($image->path) }}" class="img-fluid p-3 rounded" alt="...">
                            </div>
                        @empty
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/29/1200/200" class="img-fluid p-3 rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/28/1200/200" class="img-fluid p-3 rounded" alt="...">
                            </div>
                        @endforelse
                    </div>
                
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
                <div class="mt-4">
                    <h5 class="card-title">{{ $announcement->title }}</h5>
                    <p class="card-text">{{ $announcement->body }}</p>
                    <p class="card-text">{{ $announcement->price }}</p>
                    <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">
                        Categoria {{ $announcement->category ? $announcement->category->name : 'N/A' }}
                    </a>
                    <p class="card-footer mt-3">
                        Pubblicato il {{ $announcement->created_at ? $announcement->created_at->format('d/m/Y') : 'N/A' }} da
                        {{ $announcement->user ? $announcement->user->name : 'N/A' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
