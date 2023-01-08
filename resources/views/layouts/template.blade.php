<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Página para el proyecto de DAW" />
    <meta name="author" content="" />
    <title>{{ config('app.name', 'Your Band Music') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="home">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#home">Your Band Music</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person"></i>
                                    {{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus"></i>
                                    {{ __('Registro') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}"><i class="bi bi-person-circle"></i>
                                {{ Auth::user()->name }}</a>
                        </li>
                    @endguest
                    <li class="nav-item"><a class="nav-link" href="#compraventa"><i class="bi bi-wallet2"></i>
                            Compra Venta</a></li>
                    <li class="nav-item"><a class="nav-link" href="#grupos"><i class="bi bi-people-fill"></i>
                            Grupos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tutoriales"><i class="bi bi-display"></i>
                            Tutoriales</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#contact"><i class="bi bi-card-text"></i>
                            Posts</a>
                    </li> --}}
                    {{-- <li class="nav-item"><a class="nav-link" href="#about"><i class="bi bi-info-circle"></i>
                            Sobre nosotros</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="#posts"><i class="bi bi-card-text"></i>
                            Posts</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#contact"><i class="bi bi-envelope"></i>
                            Contacto</a>
                    </li> --}}

                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <img class="d-inline-block align-middle mr-2" width="10%" height="10%" alt=""
                        src="assets/logo_white.png" />
                    <h1 class="text-white font-weight-bold">Your Band Music</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">
                        Web dedicada a músicos para la formación de grupos musicales,
                        búsqueda de profesores, clases, compra-venta de instrumentos y tutoriales.
                    </p>
                    <p class="text-white-50 mb-5">

                        <i class="bi bi-info-circle"></i>
                        Esta página es un projecto estudiantil sin ánimo de lucro para el curso de DAW
                    </p>
                    {{-- <a class="btn btn-primary btn-xl" href="#about">Más información</a> --}}
                </div>
            </div>
        </div>
    </header>

    <!-- CompraVenta-->
    <div id="compraventa">
        <hr class="divider-light" />
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="text-uppercase Roboto"><i class="bi bi-wallet2"></i> Compra Venta</h2>
        </div>
        <div class="container-fluid p-0">
            <div class="row g-0">
                {{-- elemento --}}
                @foreach ($compraventa as $instrumento)
                    <div class="col-lg-4 col-sm-6 border shadow">

                        <a class="compraventa-box" title={{ $instrumento->slug }}>
                            <img class="img-fluid rounded" src="assets/img/portfolio/thumbnails/pacifica.jpg"
                                alt="..." />
                            <div class="compraventa-box-caption">
                                <div class="project-category text-white-75">
                                    {{ $instrumento->brand . ' ' . $instrumento->model }}
                                </div>
                                <div class="project-category text-white-50">
                                    Estado: {{ $instrumento->state_product }}
                                </div>
                                <div class="project-category text-white-50">
                                    Precio: {{ $instrumento->price }} €
                                </div>
                                <p>
                                <div class="project-name">
                                    <form method="POST"
                                        action="{{ route('user.compraventa.details', $instrumento->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-light">
                                            ¡Ver más!
                                        </button>
                                    </form>

                                </div>
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
        <hr class="divider-light" />
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <a class="btn btn-secondary btn-xl" href={{ route('compraventa') }}>¡Ver más!</a>
            </div>
            {{-- <hr class="divider-light" /> --}}
        </div>
    </div>
    {{-- GRUPOS --}}
    <!-- Services-->
    <section class="page-section" id="grupos">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center text-uppercase mt-0"><i class="bi bi-people-fill"></i> Grupos</h2>
            {{-- <hr class="divider" /> --}}
            <div class="row gx-4 gx-lg-5">

                @foreach ($grupos as $grupo)
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <h3 class="h4 mb-2"> {{ $grupo->name }}</h3>
                            <p class="text-muted mb-0">Este grupo esta buscando:</p>
                            <ul class="list-group">
                                <form method="POST" action="{{ route('user.grupos.details', $grupo->id) }}">
                                    @csrf
                                <li class="list-group-item border-0">
                            <button type="submit" class="shadow border-0 btn btn-outline-primary rounded-pill">
                                    <strong>{{ $grupo->search }}</strong>
                            </button>
                                </li>
                                </form>
                            </ul>
                            <p class="text-muted mb-0">En {{ $grupo->state }} </p>
                        </div>
                    </div>
                @endforeach
                <hr class="divider-light" />
                <a class="btn btn-secondary btn-xl" href="{{ route('grupos') }}">¡Ver más!</a>

            </div>
        </div>
    </section>

    <!-- Portfolio-->

    <div id="portfolio">
        <div id="tutoriales">
    {{-- <div id="portfolio"> --}}

        <div class="container px-4 px-lg-5 text-center">
            <h2 class="text-center text-uppercase mt-0"><i class="bi bi-display"></i> Tutoriales</h2>
        </div>
        <div class="container-fluid p-0">
            <div class="row g-0">
                @foreach ($tutoriales as $tutorial)
                    <div class="col-lg-4 col-sm-6">
                        <form method="POST" action="{{ route('user.tutoriales.details', $tutorial->id) }}">
                            @csrf
                            <button type="submit" class="shadow border-0">
                                <a class="portfolio-box">
                                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/flv.jpg"
                                        alt="..." />
                                    <div class="portfolio-box-caption">
                                        <div class="project-category text-white-50">{{ $tutorial->type }}</div>
                                        <div class="project-name">{{ $tutorial->name }}</div>

                                    </div>
                                </a>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <hr class="divider-light" />
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <a class="btn btn-secondary btn-xl" href={{ route('tutoriales') }}>¡Ver más!</a>
            </div>
            <hr class="divider-light" />
        </div>
    </div>
    </div>

    <!-- About-->
    <section class="page-section bg-primary" id="posts">

        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    {{-- <h1 class="text-white"><i class="bi bi-info-circle"></i></h1> --}}
                    <h2 class="text-center text-uppercase text-white mt-0"><i class="bi bi-card-text"></i> Posts</h2>
                    <div class="row gx-4 gx-lg-5">
                        {{-- <hr class="divider divider-light" /> --}}
                        <p class="text-white-75 mb-4">¡Los últimos posts de la comunidad!</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->name }}</h5>
                                <p class="card-text">
                                    {{ $post->extract }}
                                </p>
                            </div>

                            <div class="card-body text-center">
                                {{-- <a href="#{{ $post->id }}" class="btn btn-primary">Leer más</a> --}}
                                <form method="POST" action="{{ route('user.posts.details', $post->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        Leer más
                                    </button>
                                </form>
                            </div>

                        </div>
                        <p>
                    </div>
                @endforeach

            </div>
            <p>
                {{-- <div class="container px-4 px-lg-5">

            </div> --}}
            <div class="row gx-4 gx-lg-5">
                <a class="btn btn-secondary btn-xl" href={{ route('posts') }}>¡Ver más!</a>
            </div>
    </section>
    {{-- <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <i class="bi-phone fs-2 mb-3 text-muted"></i>
                    <div>+34 (942) 000-000</div>
                </div>
            </div> --}}
    </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-4">
        <div class="container px-3 px-lg-5ç4">
            <div class="small text-center text-muted">Contacto:
                <a href="mailto:yourbandmusic@outlook.es">yourbandmusic@outlook.es</a>
            </div>
            <div class="small text-center text-muted">Copyright &copy; 2022 - Your Band Music</div>

        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
