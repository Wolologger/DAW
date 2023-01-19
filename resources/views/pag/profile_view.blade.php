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

@php
    $user = Auth::user();
@endphp

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($request as $user)

                    <div class="card-header text-center">
                        {{-- {{ __('Mi Compra Venta de Intrumentos') }} --}}
                        {{ $user->name }}
                    </div>
                    <div class="container">
                        <div class="row justify-content-center p-2">
                            <div class="col p-2 text-center">
                                {{-- <img src="../assets/img/portfolio/thumbnails/pacifica.jpg" class="img-fluid rounded w-auto h-auto"> --}}
                                @if ($user->image)
                                <img src="{{ asset($user->image->url) }}" alt="{{ $user->name }}" class="rounded-circle border"
                                {{-- width="220px" height="220px"> --}}>
                                @else
                                <img src="../assets/img/portfolio/thumbnails/user.png" class="rounded-circle border"
                                width="220px">
                                @endif

                                {{-- <img src="aaaa" width="auto" height="380px"> --}}
                            </div>
                            <div class="col p-2">
                                <p> Nombre: {{ $user->name }}
                                <p> Correo: {{ $user->email }}
                                <p> Número de grupos: {{ $count_grupos }}
                                <p> Instrumentos en venta: {{ $count_compraventa }}
                                <p> Número de posts publicados: {{ $count_posts }}
                                <p> Número de tutoriales: {{ $count_tutoriales }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
