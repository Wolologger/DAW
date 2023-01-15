@extends('layouts.app')

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Página para el proyecto de DAW" />
    <meta name="author" content="Andrés Sierra" />
    <title>{{ config('app.name', 'Your Band Music') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../../css/styles.css" rel="stylesheet" />
</head>


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($posts as $post)
                        <div class="card-header text-center text-uppercase">{{ $post->nombre_post }}</div>
                        <div class="card-body">
                            {{-- <div class="card mb-3"> --}}
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <div class="card-body">

                                        <img class="img-fluid rounded"
                                            src="../../../assets/img/portfolio/thumbnails/pacifica.jpg" alt="..." />
                                        <p>
                                        <p class="card-text"><strong>Creado por:</strong> {{ $post->usuario }}</p>
                                        <p class="card-text"><strong>Fecha:</strong>
                                            {{ date('d-m-Y', strtotime($post->posts_created_at)) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text"><strong>Categoria:</strong> {{ $post->category }}</p>
                                        <p class="card-text"><strong>Resumen:</strong> {{ $post->extract }}</p>
                                        {{-- <p class="card-text"><strong>Cuerpo:</strong><br> {{ $post->body }}</p> --}}

                                        </p>
                                    </div>


                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-md-auto">
                                    <div class="card-body">
                                        <p class="card-text"><strong>Cuerpo:</strong><br> {!! $post->body !!}</p>

                                    </div>
                                </div>
                                <p>
                                    {{-- <hr class="light"> --}}
                                <h3 class="text-center card border-secondary text-primary fw-bold p-3"> Comentarios:</h3>
                                <hr class="divider">
                                @if ($coments->count() <= 0)
                                    <h5 class="text-center">No existen comentarios en este post</h5>
                                @else
                                    @auth

                                        <button id="showButton" class="btn btn-lg btn-info text-light form-control">Publicar
                                            nuevo comentario</button>
                                        <button id="hideButton" style="display: none;"
                                            class="btn btn-lg btn-warning text-light form-control">Cancelar</button>
                                        <form id="form" style="display: none;">
                                            <!-- Tu formulario va aquí -->
                                                <label for="descripcion">Comentario</label>
                                                <textarea class="form-control" name="cuerpo" id="cuerpo" rows="3"></textarea>
                                                <button class="btn btn-lg btn-success text-light"> Publicar
                                                </button>

                                        </form>
                                        <p>
                                        <p>


                                        @endauth

                                        @foreach ($coments as $coment)
                                            {{-- <div class="card-body"> --}}
                                            {{-- <div class="card mb-3"> --}}
                                            {{-- <div class="row g-0"> --}}
                                            {{-- <div class="col-md-auto rounded"> --}}
                                            <div class="card-header border">
                                                <div class="text-start">
                                                    <label class="text-primary"> {{ $coment->usuario }}
                                                    </label>
                                                </div>
                                            </div>
                                    </p>
                                    <div class="card-body">
                                        <div class="text-start">
                                            <label class="card-text text-muted text-end"><strong>Fecha:</strong>
                                                {{ date('d-m-Y', strtotime($coment->updated_at)) }}</label>
                                            <hr class="divider-light">
                                        </div>
                                        <p class="card-text">{!! $coment->descripcion !!}</p>

                                    </div>
                                    {{-- </div> --}}
                                    @auth
                                        @if ($coments->user_id = auth()->user()->id)
                                            <h1> SIIII </h1>
                                            <button class="btn-primary">Editar</button>
                                            <button class="btn-danger">Borrar</button>
                                        @else
                                            <h1> NOOOO </h1>
                                        @endif
                                    @endauth
                                    {{-- </div> --}}
                                    {{-- </div> --}}
                                    <hr>
                                    {{-- </div> --}}
                                @endforeach
                    @endif
                    @endforeach

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        let showButton = document.getElementById("showButton");
        let hideButton = document.getElementById("hideButton");
        let form = document.getElementById("form");

        showButton.addEventListener("click", function() {
            form.style.display = "block";
            hideButton.style.display = "block";
            showButton.style.display = "none";
        });

        hideButton.addEventListener("click", function() {
            form.style.display = "none";
            hideButton.style.display = "none";
            showButton.style.display = "block";
        });
    </script>
@endsection
