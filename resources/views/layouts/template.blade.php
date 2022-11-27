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
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Your Band Music</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person"></i> {{ __('Login') }}</a>
                                    </li>
                                @endif
    
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus"></i> {{ __('Registro') }}</a>
                                    </li>
                                @endif
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user') }}"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</a>
                            </li>  
                            @endguest
                        <li class="nav-item"><a class="nav-link" href="#compraventa"><i class="bi bi-wallet2"></i> Compra Venta</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services"><i class="bi bi-people-fill"></i> Grupos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio"><i class="bi bi-display"></i> Tutoriales</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about"><i class="bi bi-info-circle"></i> Sobre nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact"><i class="bi bi-envelope"></i> Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <img class="d-inline-block align-middle mr-2"  width="15%" height="15%" alt="" src="assets/logo_white.png"/>
                        <h1 class="text-white font-weight-bold">Your Band Music</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">
                            Web dedicada a músicos para la formación de grupos musicales, 
                            búsqueda de profesores, clases, compra-venta de instrumentos y tutoriales. 
                        </p>
                        <a class="btn btn-primary btn-xl" href="#about">Más información</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- CompraVenta-->
        <div id="compraventa">
            <hr class="divider-light" />    
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-uppercase Roboto"><i class="bi bi-wallet2"></i> Compra Venta</h2>
                </div>
            </div>    
            <div class="container-fluid p-0">
                <div class="row g-0">
                    {{-- elemento --}}
                    <div class="col-lg-4 col-sm-6">
                        <a class="compraventa-box" href="assets/img/portfolio/fullsize/pacifica.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/pacifica.jpg" alt="..." />
                            <div class="compraventa-box-caption">
                                <div class="project-category text-white-75">Yamaha Pacifica</div>
                                <div class="project-category text-white-50">Estado: Excelente</div>
                                <div class="project-category text-white-50">Precio: 550€</div>
                                <p>
                                    <div class="project-name">
                                        <button type="button" class="btn btn-outline-light">
                                            ¡Ver más!
                                        </button>
                                    </div>
                                </p>
                            </div>
                        </a>
                        
                    </div> 
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

        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center text-uppercase mt-0"><i class="bi bi-people-fill"></i> Grupos</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <h3 class="h4 mb-2">Luna Vacía</h3>
                            <p class="text-muted mb-0">Este grupo esta buscando:</p>
                            <ul class="list-group">
                                <li class="list-group-item"><a href='#'><strong>Bajista</strong></a></li>
                                <li class="list-group-item"><a href='#'><strong>Batería</strong></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"></div>
                            <h3 class="h4 mb-2">Forraje</h3>
                            <p class="text-muted mb-0">Este grupo esta buscando:</p>
                            <ul class="list-group">
                                <li class="list-group-item"><a href='#'><strong>Cantante</strong></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"></div>
                            <h3 class="h4 mb-2">Exceso</h3>
                            <p class="text-muted mb-0">Este grupo esta buscando:</p>
                            <ul class="list-group">
                                <li class="list-group-item"><a href='#'><strong>Guitarrista</strong></a></li>
                                <li class="list-group-item"><a href='#'><strong>Bajista</strong></a></li>
                                <li class="list-group-item"><a href='#'><strong>Cantante</strong></a></li>
                                <li class="list-group-item"><a href='#'><strong>Productor</strong></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"></div>
                            <h3 class="h4 mb-2">Extremoduro</h3>
                            <p class="text-muted mb-0">Este grupo esta buscando:</p>
                            <ul class="list-group">
                                <li class="list-group-item"><a href='#'><strong>Cantante</strong></a></li>
                                <li class="list-group-item"><a href='#'><strong>Guitarrista</strong></a></li>
                            </ul>
                        </div>

                    </div>
                    <hr class="divider-light" />
                    <a class="btn btn-secondary btn-xl" href="{{ route('grupos') }}">Más información</a>

                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-center text-uppercase mt-0"><i class="bi bi-display"></i> Tutoriales</h2>
                </div>
            </div>    

            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/flv.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/flv.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Edicción Musical</div>
                                <div class="project-name">Fl Studio</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/cubase.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/cubase.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Edicción Musical</div>
                                <div class="project-name">Cubase</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/moises.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/moises.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Moises</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/guitarpro.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/guitarpro.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Guitar Pro</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/logicpro.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/logicpro.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Edicción Musical</div>
                                <div class="project-name">Logic Pro</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/musescore.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/musescore.jpg" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">MuseScore</div>
                            </div>
                        </a>
                    </div>
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

        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1 class="text-white"><i class="bi bi-info-circle"></i></h1>
                        <h2 class="text-white mt-0">Projecto para final de curso DAW</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4"> Esta página es un projecto estudiantil sin ánimo de lucro para el curso de DAW</p>
                        {{-- <a class="btn btn-light btn-xl" href="#">¡Comenzar!</a> --}}
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h1><i class="bi bi-envelope"></i></h1>
                        <h2 class="mt-0">¡Ponte en contacto con nosotros!</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Envíenos un mensaje y nos pondremos en contacto con usted lo antes posible.</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Nombre completo</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Se requiere un nombre.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Se requiere un Email.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email no váido.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Número de teléfono</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Se requiere un número de teléfono.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Mensaje</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Su comentario ha sido enviado!</div>
                                    Para activar este formulario, regístrese en
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error al enviar el mensaje</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Enviar</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+34 (942) 000-000</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2022 - Your Band Music</div></div>
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
