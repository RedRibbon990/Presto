<x-layout>
    <section class="vh-100 bg-login h-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" position-absolute d-flex py-3 justify-content-center">
                    <img class="img-sub img-fluid" src="https://picsum.photos/550/400" alt="Sfondo">
                    <img class="img-sub img-fluid" src="https://picsum.photos/550/400" alt="Sfondo">
                </div>
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card shadow-lg" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-4">Login</h2>

                                <form method="POST" action="{{ route('login') }}" id="login">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail" class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ old('email') }}" autocomplete="email">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-text" id="emailHelp">We'll never share your email with anyone else.</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="current-password">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 form-check d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }} autocomplete="on">
                                            <label class="form-check-label" for="exampleCheck1">Ricordati di me</label>
                                        </div>
                                        <a class="btn btn-outline-primary" href="{{ route('register') }}">Registrati</a>
                                    </div>
                                    
                                    <div class="mb-3 d-flex justify-content-center mt-4">
                                        <button type="submit" class="welcome-btn btn btn-lg btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
