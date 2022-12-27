@extends('layouts.app')

{{-- <head>
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
    <link href="../css/styles.css" rel="stylesheet" />
</head> --}}


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Compra Venta de Intrumentos') }}</div>

                    {{-- <div class="container"> --}}
                    <div class="row justify-content-center">
                        <form method="POST" action="{{ route('compraventa_filtro') }}">
                            @csrf
                            <div class="col border">
                                {{-- Tipo: --}}
                                <select name="tipo" id="tipo">
                                    <option value="" selected>Elige tipo</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->type }}">{{ $tipo->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col border">
                                {{-- Marca: --}}
                                <select name="marca" id="marca">
                                    <option value="" selected>Elige marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->brand }}">{{ $marca->brand }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col border">
                                {{-- Estado: --}}
                                <select name="estado" id="estado">
                                    <option value="" selected>Elige estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->state_product }}">{{ $estado->state_product }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col border">
                                {{-- <strong>Provincia:</strong> --}}
                                <select name="provincia" id="provincia">
                                    <option value="" selected>Elige provincia</option>
                                    @foreach ($provincias as $provincia)
                                        <option value="{{ $provincia->state }}">{{ $provincia->state }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col border">
                                <div class="d-grid gap-2 border rounded-circle">
                                    <button type="submit" class="btn btn-primary text-secondary"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card mb-3 border">

                        <div class="row g-0">
                            @foreach ($compraventa as $instrumento)
                                <div class="col-md-6 ">
                                    {{-- @foreach ($imagenes as $imagen) --}}
                                    <div class="card-body">
                                        {{-- <img class="img-fluid rounded" width="650" height="350" src={{$imagen->url}} --}}
                                        <img class="img-fluid rounded" width="650" height="350" src='https://via.placeholder.com/650x350.png/008888?text=repellendus'
                                            alt="..." />
                                    </div>
                                    {{-- @endforeach --}}
                                </div>
                                <div class="col-md-6 ">
                                    <div class="card-body">
                                        {{-- <h4>Tipo: {{ $instrumento->type }}</h4> --}}

                                        <h5 class="card-title">Instrumento:
                                            {{ $instrumento->brand . ' ' . $instrumento->model }}</h5>
                                        <p class="card-text">Tipo: {{ $instrumento->type }}</p>
                                        <p class="card-text">Precio: {{ $instrumento->price }} €</p>
                                        <p class="card-text">Estado: {{ $instrumento->state_product }}</p>
                                        <p class="card-text">Provincia: {{ $instrumento->state }}</p>
                                        </p>
                                        {{-- <div class="card-body text-center"> --}}
                                        <form method="POST"
                                            action="{{ route('user.compraventa.details', $instrumento->id) }}">
                                            @csrf
                                            <div class="d-grid gap-2 border rounded">
                                                <button type="submit"
                                                    class="btn btn-outline text-primary">{{ 'Más detalle' }}</button>
                                            </div>
                                        </form>
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
