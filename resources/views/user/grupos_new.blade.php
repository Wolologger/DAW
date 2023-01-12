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
                        {{ __('Nuevo Grupo') }}
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
                                    <h5 class="card-title">Nuevo Grupo:</h5>
                                    {{-- <h5 class="card-title">Nuevo Instrumento</h5> --}}
                                    <form method="POST" action="{{ route('user.grupos.new', $user) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="Nombre de Grupo">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Contacto</label>
                                            <input type="text" class="form-control" id="contacto" name="contacto"
                                                placeholder="email@example.es">
                                        </div>
                                        <div class="form-group">
                                            <label for="precio">Género músical </label>
                                            <input type="text" class="form-control" id="genero" name="genero"
                                                placeholder="Rock">
                                        </div>
                                        <div class="form-group">
                                            <label for="provincia">Provincia</label>
                                            <select required name="provincia" class="form-control">
                                                <option value="">Elige Provincia</option>
                                                <option value="Álava/Araba">Álava/Araba</option>
                                                <option value="Albacete">Albacete</option>
                                                <option value="Alicante">Alicante</option>
                                                <option value="Almería">Almería</option>
                                                <option value="Asturias">Asturias</option>
                                                <option value="Ávila">Ávila</option>
                                                <option value="Badajoz">Badajoz</option>
                                                <option value="Baleares">Baleares</option>
                                                <option value="Barcelona">Barcelona</option>
                                                <option value="Burgos">Burgos</option>
                                                <option value="Cáceres">Cáceres</option>
                                                <option value="Cádiz">Cádiz</option>
                                                <option value="Cantabria">Cantabria</option>
                                                <option value="Castellón">Castellón</option>
                                                <option value="Ceuta">Ceuta</option>
                                                <option value="Ciudad Real">Ciudad Real</option>
                                                <option value="Córdoba">Córdoba</option>
                                                <option value="Cuenca">Cuenca</option>
                                                <option value="Gerona/Girona">Gerona/Girona</option>
                                                <option value="Granada">Granada</option>
                                                <option value="Guadalajara">Guadalajara</option>
                                                <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                                                <option value="Huelva">Huelva</option>
                                                <option value="Huesca">Huesca</option>
                                                <option value="Jaén">Jaén</option>
                                                <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                                                <option value="La Rioja">La Rioja</option>
                                                <option value="Las Palmas">Las Palmas</option>
                                                <option value="León">León</option>
                                                <option value="Lérida/Lleida">Lérida/Lleida</option>
                                                <option value="Lugo">Lugo</option>
                                                <option value="Madrid">Madrid</option>
                                                <option value="Málaga">Málaga</option>
                                                <option value="Melilla">Melilla</option>
                                                <option value="Murcia">Murcia</option>
                                                <option value="Navarra">Navarra</option>
                                                <option value="Orense/Ourense">Orense/Ourense</option>
                                                <option value="Palencia">Palencia</option>
                                                <option value="Pontevedra">Pontevedra</option>
                                                <option value="Salamanca">Salamanca</option>
                                                <option value="Segovia">Segovia</option>
                                                <option value="Sevilla">Sevilla</option>
                                                <option value="Soria">Soria</option>
                                                <option value="Tarragona">Tarragona</option>
                                                <option value="Tenerife">Tenerife</option>
                                                <option value="Teruel">Teruel</option>
                                                <option value="Toledo">Toledo</option>
                                                <option value="Valencia">Valencia</option>
                                                <option value="Valladolid">Valladolid</option>
                                                <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                                                <option value="Zamora">Zamora</option>
                                                <option value="Zaragoza">Zaragoza</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="estado">Busca músico</label>
                                            <select class="form-control" name="musico" id="musico">
                                                <option value="">Elige músico</option>
                                                <option value="Ninguno">Ninguno</option>
                                                <option value="Bateria">Batería</option>
                                                <option value="Cantante">Cantante</option>
                                                <option value="Guitarrista">Guitarrista</option>
                                                <option value="Teclista">Teclista</option>
                                                <option value="Tecnico de sonido">Técnico de sonido</option>
                                            </select>
                                        </div>

                                </div>
                            </div>
                            <div class="form-group p-3">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
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
              selector:'#descripcion'
          });
        </script>
    @endsection
