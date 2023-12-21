<div>
    <h1 >Crea il tuo annuncio</h1>

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

        <div class="mb-3">
            <label for="category">Categoria</label>
            <select wire:model.defer ="category" id="category" class="form-control @error('category') is-invalid @enderror"">
                <option value="">Scegli la categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
            @error('temporary_images.*')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview:</p>
                    <div class="row border border-4 border-info d-flex justify-content-center rounded shadow py-4">
                        @foreach ($images as $key => $image)
                            <div class="col-md-4 my-3">
                                <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}}); background-size: cover; padding-bottom: 66.67%;"></div>
                                <button class="btn btn-danger shadow d-block text-center mt-2 mx-auto" type="button" wire:click="removeImage({{$key}})">Cancella</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    
        <button type="submit" class="btn btn-primary shadow px-4 py-2">Crea</button>
    </form>
</div>
