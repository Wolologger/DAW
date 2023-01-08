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
                    @foreach ($grupos as $grupo)
                    <div class="card-header text-center text-uppercase">{{ $grupo->grupos_name }}</div>
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="row g-0">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            
                                        <img class="img-fluid rounded" src="../../../assets/img/portfolio/thumbnails/pacifica.jpg"
                                            alt="..." /><p>
                                            {{-- <p class="card-text"><strong>Usuario:</strong> {{  $grupo->usuario}}</p> --}}
                                            <p class="card-text"><strong>Contacto:</strong> <a href="mailto:{{  $grupo->contact}}">{{  $grupo->contact}}</a></p>
                                            <p class="card-text"><strong>Provincia:</strong> {{ $grupo->grupos_state }}</p>
                                            <p class="card-text"><strong>Fecha:</strong> {{  date('d-m-Y', strtotime($grupo->grupos_created_at))}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <p class="card-text"><strong>Busca:</strong><br> {{ $grupo->search }}</p>
                                            <p class="card-text"><strong>Descripcion:</strong><br> {{ $grupo->body }}</p>
                                            
                                        </p>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
