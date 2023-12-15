<x-layout>
    <div class="container-fluid-front p-4 bg-black text-center text-white position-relative">
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
                <a href="" class="btn-info btn">
                    <span class="link__text" property="name">Inizia da qui</span>
                </a>
            </div>
    
            <div class="col-md-6 sub-page position-relative">
                <img class="img-fluid position-absolute d-flex" src="https://picsum.photos/id/30/1200/850" alt="Sfondo">
            </div>
        </div>
    </div>
    

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center text-light my-4">
                <p class="h2 my-2 fw-bold">{{__('ui.allAnnouncements')}}</p>
                <div class="row">
                    @foreach ($announcements as $announcement)
                        <div class="col-12 col-sm-6 col-lg-4 my-4">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->body}}</p>
                                    <p class="card-text">{{$announcement->price}}</p>
                                    <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary shadow">Visualizza</a>
                                    <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria {{$announcement->category->name}}</a>
                                    <p class="card-footer m-0">Pubblicato il {{$announcement->created_at->format('d/m/Y')}} Autore {{$announcement->user->name ?? 'N/A'}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
