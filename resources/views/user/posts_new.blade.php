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

@php
    $user = Auth::user()->id;
@endphp

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{ __('Nuevo Post') }}
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
                                    <h5 class="card-title">Nuevo Post</h5>
                                    <form method="POST" action="{{ route('user.posts.new', $user) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nombre</label>
                                            <input type="text" class="form-control" id="marca" name="nombre"
                                                placeholder="Post nº1">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Categoria</label>
                                            <input type="text" class="form-control" id="categoria" name="categoria"
                                                {{-- placeholder="Pacifica" value={{$post->model}}> --}} placeholder="Noticias">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Resumen</label>
                                            <input type="text" class="form-control" name="resumen" id="resumen">
                                        </div>

                                </div>
                            </div>
                            <div class="form-group p-3">
                                <label for="descripcion">Cuerpo</label>
                                <textarea class="form-control" name="cuerpo" id="cuerpo" rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card text-center border">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i>
                            <span class="text-light text-decoration-none">
                                {{ 'Crear' }}
                            </span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
          <script src="https://cdn.tiny.cloud/1/qz8w05apm8sx0woys8v6oup9vi7hrr3aqx39uih6zzp5197d/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
          tinymce.init({
              selector:'#cuerpo'
          });
        </script>
    @endsection
