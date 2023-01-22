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

                                        @if ($post->image)
                                        <img src="{{ asset($post->image->url) }}" alt="{{ $post->name }}" class="img-fluid">
                                        @else
                                        {{-- <img class="img-fluid rounded" src="../../../assets/img/portfolio/thumbnails/1.jpg"
                                        alt="..." /> --}}
                                        @endif
                                        <p>
                                        <p class="card-text"><strong>Creado por:</strong> {{ $post->usuario }}</p>
                                        <p class="card-text"><strong>Fecha:</strong>
                                            {{ date('d/m/Y', strtotime($post->posts_created_at)) }}</p>
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
                                <h3 class="text-center card border-secondary rounded-pill text-primary fw-bold p-3"> Comentarios:</h3>
                                <hr class="divider">

                                    @auth

                                        <button id="showButton" class="btn btn-lg btn-info text-light form-control">
                                            <i class="bi bi-plus-circle"></i>
                                            Publicar nuevo comentario</button>
                                        <button id="hideButton" style="display: none;"
                                            class="btn btn-lg btn-warning text-light form-control">
                                            <i class="bi bi-x-square"></i>
                                            Cancelar</button><p>
                                        {{-- <form id="form" style="display: none;" action="{{ route('user.comment.new', [auth()->user()->id, $post->id])" }}> --}}
                                            <form method="POST" id="form" style="display: none;"
                                                {{-- action="{{ route('user.comment.new', [auth()->user()->id, $post->id]) }}"> --}}
                                                action="{{ route('user.comment.new', [auth()->user()->id]) }}">
                                                <input type="hidden" name="post_id" value="{{$idpost}}">

                                            @csrf
                                            <textarea class="form-control" name="comentario" id="comentario" rows="3" required></textarea>
                                            <button class="btn form-control btn-lg btn-success text-light">
                                                <i class="bi bi-file-earmark-plus"></i>
                                                Publicar
                                            </button>

                                        </form>
                                        <p>
                                        <p>


                                        @endauth
                                        @if ($coments->count() <= 0)
                                        <h5 class="text-center">No existen comentarios en este post</h5>
                                        @else

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
                                                {{ date('d/m/Y', strtotime($coment->updated_at)) }}</label>
                                            <hr class="divider-light">
                                        </div>
                                        <p class="card-text">{!! $coment->descripcion !!}</p>

                                    {{-- </div> --}}
                            </div>
                            {{-- Post ID: {{$idpost}}<br>
                            Coment id {{$coment->coment_id}}<br>
                            USERPOST id {{$post->posts_user_id}}<br>

                            User_Comentario ID:{{$coment->user_id}}<br>
                            Usuario ID: {{auth()->user()->id}} --}}
                            @auth
                                @if ($coment->user_id == auth()->user()->id)
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 text-center">
                                            <div class="card border-0">
{{--
                                                        <button class="btn form-control btn-lg btn-primary" id="showButton">
                                                        <i class="bi bi-pencil"></i>
                                                        Editar</button>
 --}}
                                                        <button id="hideButton" style="display: none;"
                                                        class="btn btn-lg btn-warning text-light form-control">
                                                        <i class="bi bi-x-square"></i>
                                                        Cancelar</button><p>
                                                            <form id="form" style="display: none;">
                                                                <!-- Tu formulario va aquí -->
                                                                <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
                                                                <button class="btn form-control btn-lg btn-success text-light">
                                                                    <i class="bi bi-file-earmark-plus"></i>
                                                                    Publicar
                                                                </button>

                                                            </form>
                                            </div>
                                            <p>
                                            <div class="card border-0">
                                                <form method="POST"
                                                action="{{ route('user.comment.delete', [$coment->coment_id]) }}">
                                                @csrf
                                                <button type="submit" class="btn form-control btn-lg btn-danger"
                                                    onclick="return confirm('¿Estás seguro?')"><span
                                                        class="text-light text-decoration-none">{{ 'Borrar' }}</span>
                                                </button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
