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
                    <div class="card">
                        <img src="aaaa" width="320px" height="320px">
                    </div>
                    <p> Nombre: {{ $user->name }}
                    <p> Correo: {{ $user->email }}
                    <p> Número de grupos: {{$count_grupos}}
                    <p> Instrumentos en venta: {{$count_compraventa}}
                    <p> Número de posts publicados: {{$count_posts}}
                    <p> Número de tutoriales: {{$count_tutoriales}}


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <hr class="divider">
                        <div class="container text-center">
                            <div class="row no-gutters">
                                {{-- Opcion --}}
                                <form method="POST" action="{{ route('profile_edit_view', $user->id)}}">
                                    @csrf
                                    <div class="col-6 col-md-4">
                                        <button type="submit" name="" id="" class="btn btn-warning" btn-lg
                                            btn-block">
                                            <i class="bi bi-pencil">
                                                <h5>Editar Perfil</h5>
                                            </i>
                                        </button>
                                </form>
                            </div>

                            <div class="col-6 col-md-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
        
                                <a class="link-light text-decoration-none" href="{{ route('password.update') }}">
                                    <i class="bi bi-asterisk">
                                        <h5>Cambiar contraseña</h5>
                                    </i>
                                </a>
                            </button>
        
                            </div>
        
                            {{-- opcion --}}
                            {{-- <div class="col-6 col-md-4">
                                    <button type="submit" name="" id="" class="btn btn-success" btn-lg
                                        btn-block">
                                        <i class="bi bi-file-post">
                                            <h5>Mis posts</h5>
                                        </i>
                                    </button>
                            </div> --}}

                            {{-- opcion --}}
                            {{-- <div class="col-6 col-md-4">
                                    <button type="submit" name="" id="" class="btn btn-secondary" btn-lg
                                        btn-block">
                                        <i class="bi bi-recycle">
                                            <h5>Mis compraventa</h5>
                                        </i>
                                    </button>
                            </div> --}}

                            {{-- <hr class="divider-light" /> --}}

                            {{-- opcion --}}
                            {{-- <div class="col-6 col-md-4">
                                    <button type="submit" name="" id="" class="btn btn-info" btn-lg
                                        btn-block">
                                        <i class="bi bi-display">
                                            <h5>Mis tutoriales</h5>
                                        </i>
                                    </button>
                            </div> --}}

                            {{-- <div class="col-6 col-md-4">
                                    <button type="submit" name="" id="" class="btn btn-primary" btn-lg
                                        btn-block">
                                        <i class="bi bi-asterisk">
                                            <h5>Cambiar contraseña</h5>
                                        </i>
                                    </button>
                            </div> --}}

                            {{-- opcion --}}
                            <div class="col-6 col-md-4">
                                {{-- <form method="POST" action="{{ route('user.destroy',$id)}}"> --}}
                                <form method="POST" action="{{ route('user.destroy', $user) }}">
                                    @csrf
                                    <button type="submit" name="" id="" class="btn btn-danger" btn-lg
                                        btn-block" onclick="return confirm('¿Estás seguro?')">

                                        <i class="bi bi-trash-fill">
                                            {{-- <i class="bi bi-person-x-fill"> --}}
                                            <h5>Borrar usuario</h5>
                                        </i>
                                    </button>
                                </form>
                            </div>
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

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
