<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelli di Siti Web</title>

    @livewireStyles
    @Vite(['resources/css/style.css'])
    {{$style ?? ''}}
    
</head>
<body id="rs">

    <header class="head-rs">
        <a class="navbar-brand" href="/">Presto.it</a>
        <h1>Modelli di Siti Web</h1>
    </header>
    
    <nav class="nav-rs">
        <a href="#model1">Modello 1</a> |
        <a href="#model2">Modello 2</a> |
        <a href="#model3">Modello 3</a>
    </nav>

    <div class="container-rs">
        <section id="model1" class="model">
            <h2>Modello 1</h2>
            <div class="model-image">
                <img src="{{ asset('image/modelWeb/modello1.webp') }}" alt="Modello 3">
            </div>
            <p>Descrizione del Modello 1.</p>
        </section>
    
        <section id="model2" class="model">
            <h2>Modello 2</h2>
            <div class="model-image">
                <img src="{{ asset('image/modelWeb/modello1.webp') }}" alt="Modello 3">
            </div>
            <p>Descrizione del Modello 2.</p>
        </section>
    
        <section id="model3" class="model">
            <h2>Modello 3</h2>
            <div class="model-image">
                <img src="{{ asset('image/modelWeb/modello1.webp') }}" alt="Modello 3">
            </div>
            <p>Descrizione del Modello 3.</p>
        </section>
    </div>

    <footer class="footer-rs">
        &copy; 2023 Modelli di Siti Web
    </footer>

    @livewireScripts

</body>
</html>
