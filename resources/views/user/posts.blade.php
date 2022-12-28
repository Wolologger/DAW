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
    <link href="../../css/styles.css" rel="stylesheet" />
</head>


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{ __('Mis posts') }}
                    </div>
                    @php
                        $user = Auth::user();
                    @endphp

                    <form method="POST" action="{{ route('user.posts.new_view', $user->id) }}">
                        @csrf
                        <div class="card-header">
                            <div class="card">
                                <button type="submit" class="btn btn-info">
                                    <span class="text-light text-decoration-none">
                                        {{ 'Nuevo' }}
                                    </span>
                                </button>
                    </form>
                </div>

            </div>
            <div class="card-body ">
                <div class="card mb-3 ">
                    <div class="row g-0 ">
                        @foreach ($posts as $post)
                            <div class="col-md-5">
                                <div class="card-body">

                                    <img class="img-fluid rounded" src="../../assets/img/portfolio/thumbnails/2.jpg"
                                        alt="..." />
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title">Post: {{ $post->name }}</p>
                                        <p class="card-text">Fecha creación:
                                            {{ date('d-m-Y', strtotime($post->created_at)) }}</p>
                                        <p class="card-text">Resumen: {{ $post->extract }}</p>
                                        {{-- <p class="card-text">Últm. actualización: {{  date('d-m-Y', strtotime($post->updated_at))}}</p> --}}
                                        </p>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="card-body">
                                    {{-- <div class="d-grid gap-2 col-2 mx-auto "> --}}
                                    <div class="card-text text-center">
                                        <form method="POST" action="{{ route('user.posts.edit_view', $post->id) }}">
                                            @csrf

                                            <button type="submit" class="btn btn-primary">
                                                <span class="text-light text-decoration-none">
                                                    {{ 'Editar' }}
                                                </span>
                                            </button>
                                        </form>
                                        <p>
                                        <form method="POST"
                                            action="{{ route('user.posts.delete', [$post->user_id, $post->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('¿Estás seguro?')"><span
                                                    class="text-light text-decoration-none">{{ 'Borrar' }}</span>
                                            </button>
                                        </form>
                                    </div>
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
    </div>
@endsection
