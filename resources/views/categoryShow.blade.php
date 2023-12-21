<x-layout>
    <div class="container-fluid bg-gradient text-light shadow mb-4">
        <div class="row">
            <div class="col-12 text-center p-1">
                <h1 class="display-2">{{__('ui.category')}} {{ $category->name }}</h1>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="row">
            <div class="col-12 text-center">
                <div class="row justify-content-center mt-3">
                    <p class="h4 text-light">Tutti gli annunci per questa categoria</p>
                    <div class="d-flex justify-content-center pt-2">
                        {{ $announcements->links() }}
                    </div>
                    @forelse($announcements as $announcement)
                        <div class="col-12 col-sm-6 col-lg-4 my-4">
                            <div class="card shadow" style="width: 18rem;">
                                @if ($announcement->images && count($announcement->images) > 0)
                                    <img src="{{ Storage::url($announcement->images[0]->path) }}" class="card-img-top p-3 rounded" alt="...">
                                @else
                                    <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $announcement->title }}</h5>
                                    <p class="card-text">{{ $announcement->body }}</p>
                                    <p class="card-text">{{ $announcement->price }}</p>
                                    <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary shadow">Visualizza</a>
                                    <a href="{{ route('categoryShow', compact('category')) }}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">
                                        Categoria {{ $announcement->category->name }}
                                    </a>
                                    <p class="card-footer">
                                        Pubblicato il {{ $announcement->created_at->format('d/m/Y') }}
                                        Autore {{ $announcement->user->name ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="h1">Non sono presenti annunci per questa categoria!</p>
                            <p class="h2">Pubblicane uno <a href="{{ route('announcements.create') }}" class="btn btn-success shadow">Nuovo</a></p>
                        </div>
                    @endforelse
                    <div class="d-flex justify-content-center">
                        {{ $announcements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
