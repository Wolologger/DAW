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
                    @foreach ($tutoriales as $tutorial)
                    <div class="card-header text-center text-uppercase">{{ $tutorial->name }}</div>
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="row g-0">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            @if ($tutorial->image)
                                            <img src="{{ asset($tutorial->image->url) }}" alt="{{ $tutorial->name }}" class="img-fluid">
                                            @else
                                            <img class="img-fluid rounded" src="../../../assets/img/portfolio/thumbnails/pacifica.jpg"
                                            alt="..." /><p>
                                            @endif
                                        {{-- <img class="img-fluid rounded" src="../../../assets/img/portfolio/thumbnails/pacifica.jpg"
                                            alt="..." /><p> --}}
                                            {{-- <p class="card-text"><strong>Creado por:</strong> {{  $tutorial->usuario}}</p> --}}
                                            <p class="card-text"><strong>Creado por:</strong> {{  $tutorial->user->name}}</p>

                                            <p class="card-text"><strong>Fecha:</strong> {{  date('d/m/Y', strtotime($tutorial->created_at))}}</p>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <p class="card-text"><strong>Tipo:</strong> {{ $tutorial->type }}</p>
                                            <p class="card-text"><strong>Descripcion:</strong><br> {!!$tutorial->body!!}</p>

                                        </p>
                                        </div>

                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
