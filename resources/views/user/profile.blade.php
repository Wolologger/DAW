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
    <link href="../css/styles.css" rel="stylesheet" />
</head>

@php
    $user = Auth::user();
@endphp

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{-- {{ __('Mi Compra Venta de Intrumentos') }} --}}
                        {{ $user->name }}
                    </div>

                    <div class="container">
                        <div class="row justify-content-center p-2">
                            <div class="col p-2 text-center">
                                <img src="../assets/img/portfolio/thumbnails/user.png" class="rounded-circle border"
                                    width="220px">
                            </div>
                            <div class="col p-2">
                                <p> Nombre: {{ $user->name }}
                                <p> Correo: {{ $user->email }}
                                <p> Número de grupos: {{ $count_grupos }}
                                <p> Instrumentos en venta: {{ $count_compraventa }}
                                <p> Número de posts publicados: {{ $count_posts }}
                                <p> Número de tutoriales: {{ $count_tutoriales }}
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-auto p-1 text-center">
                            <form method="POST" action="{{ route('profile_edit_view', $user->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-lg btn-block">
                                    <i class="bi bi-pencil">
                                        <h5>Editar Perfil</h5>
                                    </i>
                                </button>
                            </form>
                        </div>
                        <div class="col-md-auto p-1 text-center">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">

                                <a class="link-light text-decoration-none" href="{{ route('password.update') }}">
                                    <i class="bi bi-asterisk">
                                        <h5>Cambiar contraseña</h5>
                                    </i>
                                </a>
                        </div>
                        <div class="col-md-auto p-1 text-center">
                            <form method="POST" action="{{ route('user.destroy', $user) }}">
                                @csrf
                                <button type="submit" name="" id="" class="btn btn-danger btn-lg btn-block"
                                    onclick="return confirm('¿Estás seguro?')">
                                    <i class="bi bi-trash-fill">
                                        <h5>Borrar usuario</h5>
                                    </i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <a class="dropdown-item " href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
            <div class="text-center">
                {{ __('Desconectarse') }}
            </div>
    
        </a>
    
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
    </div>
        
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    </div>

@endsection
