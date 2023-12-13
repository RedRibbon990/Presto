<div>
    <h1>Crea il tuo annuncio</h1>

    @if (session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-success">
            {{session('message')}}
        </div>        
    @endif
    <form wire:submit.prevent="store">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo Annuncio</label>
            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Descrizione</label>
            <textarea wire:model="body" class="form-control  @error('body') is-invalid @enderror" id="body" rows="3" required></textarea>
            @error('body')
                <span class="text-danger">{{ $message }}</span>
            @enderror  
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input wire:model="price" type="number" class="form-control  @error('price') is-invalid @enderror" id="price" required>
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary shadow px-4 py-2">Crea</button>
    </form>
</div>
