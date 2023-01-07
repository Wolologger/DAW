@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">

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
                    <div class="card-header text-center">
                        {{ __('Editar Tutorial') }}
                    </div>
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    {{-- <img class="img-fluid rounded" src="../../../assets/img/portfolio/thumbnails/pacifica.jpg" alt="..." />  src="" alt="..." /> --}}

                                    <form>
                                        @csrf

                                        <div class="card-body">

                                            <div class="form-group">
                                                <h5 class="card-title">Subir imagen:</h5>
                                                <div class="card" style="width: auto; height: auto;">
                                                    <img class="card-img-top" src=".../100px180/?text=Image cap"
                                                        alt="...">
                                                </div>
                                                <div class="mb-3">
                                                    <input class="form-control form-control-sm" id="formFileSm"
                                                        type="file">
                                                </div>
                                            </div>
                                    </form>
                                </div>



                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">Editar Tutorial:</h5>
                                    {{-- <h5 class="card-title">Nuevo Instrumento</h5> --}}
                                    @foreach ($resultado as $tutorial)
                                    <form method="POST"
                                    action="{{ route('user.tutoriales.edit', [$tutorial->id, $tutorial->user_id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="precio">Nombre </label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            placeholder="300" value={{$tutorial->name}}>
                                    </div>

                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Tipo</label>
                                            <input type="text" class="form-control" id="tipo" name="tipo"
                                                placeholder="Pacifica" value={{$tutorial->type}}>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Resumen</label>
                                            <input type="text" class="form-control" name="resumen" id="resumen" value="{{$tutorial->extract}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Cuerpo</label>
                                            <textarea class="form-control" name="cuerpo" id="cuerpo" rows="3">{{$tutorial->body}}</textarea>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card text-center">
                        <button type="submit" class="btn btn-warning">
                            <span class="text-light text-decoration-none">
                                <i class="bi bi-arrow-up-short"></i>
                                {{ 'Actualizar' }}
                            </span>
                        </button>
                    </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
