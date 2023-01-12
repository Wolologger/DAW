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
                        {{ __('Nuevo Compraventa') }}
                    </div>
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-6">
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
                                                    <input class="form-control form-control-sm" id="image"
                                                        type="file" name="image">
                                                </div>
                                            </div>
                                    </form>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="card-body border">
                                    <h5 class="card-title">Nuevo Instrumento:</h5>
                                    <form method="POST" action="{{ route('user.compraventa.new', $user) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="tipo">Tipo</label>
                                            <select required class="form-control" id="tipo" name="tipo">
                                                <option value="">Elige Tipo</option>
                                                <option value="Guitarra">Guitarra</option>
                                                <option value="Piano">Piano</option>
                                                <option value="Bajo">Bajo</option>
                                                <option value="Amplificador">Amplificador</option>
                                                <option value="Bateria">Bateria</option>
                                                <option value="Accesorio">Accesorio</option>
                                                <option value="Otro">Otro</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="marca">Marca</label>
                                            <input type="text" class="form-control" id="marca" placeholder="Yamaha"
                                                required name="marca">
                                        </div>
                                        <div class="form-group">
                                            <label for="modelo">Modelo</label>
                                            <input type="text" class="form-control" id="modelo" placeholder="Pacifica"
                                                required name="modelo">
                                        </div>
                                        <div class="form-group">
                                            <label for="precio">Precio <i class="bi bi-currency-euro"></i></label>
                                            <input type="text" class="form-control" id="precio" placeholder="300"
                                                required name="precio">

                                        </div>
                                        <div class="form-group">
                                            <label for="provincia">Provincia</label>
                                            <select required name="provincia" class="form-control" id="provincia">
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
                                            <label for="estado">Estado</label>
                                            <select required class="form-control" id="estado" name="estado">
                                                <option value="">Elige estado</option>
                                                <option value="Excelente">Excelente</option>
                                                <option value="Muy bueno">Muy bueno</option>
                                                <option value="Bueno">Bueno</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Regular">Regular</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <textarea required class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
                                        </div>
                                        {{-- <hr>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-secondary">
                                                    <i class="bi bi-plus-circle"></i>  
                                                    <span class="text-light text-decoration-none">
                                                        {{ 'Crear' }}
                                                    </span>
                                                </button>
                                            </div>
                                        </form> --}}
                                </div>
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
