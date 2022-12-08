@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Compra Venta de Intrumentos') }}</div>

                    <div class="card-body">

                        {{-- <button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block" onclick="location.href='{{ url()->previous() }}';">   
                    Atrás
                </button> --}}
                        {{-- <table class="table table-hover">
                    <tr>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>Provincia</th>
                    </tr>
                    @foreach ($compraventa as $instrumento)
                        <tr>
                            <td>{{ $instrumento->type }}</td>
                            <td>{{ $instrumento->brand }}</td>
                            <td>{{ $instrumento->model }}</td>
                            <td>{{ $instrumento->price }} €</td>
                            <td>{{ $instrumento->state_product }}</td>
                            <td>{{ $instrumento->state }}</td>
                            <td><a href="#{{ $instrumento->id }}">{{ "Ver más"}}</a></td>
                        </tr>
                    @endforeach
                </table> --}}
                        <div class="card mb-3">
                            <div class="row g-0">
                                @foreach ($compraventa as $instrumento)
                                    {{-- <div class="col-md-4 border"> --}}
                                        <div class="col-md-6">
                                        <img class="img-fluid rounded"
                                            src="assets/img/portfolio/thumbnails/pacifica.jpg" alt="..." />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                        {{-- <h4>Tipo: {{ $instrumento->type }}</h4> --}}

                                            <h5 class="card-title">Instrumento:
                                                {{$instrumento->brand . ' ' . $instrumento->model }}</h5>
                                            <p class="card-text">Precio: {{$instrumento->price }} €</p>
                                            <p class="card-text">Estado: {{$instrumento->state_product }}</p>
                                            <p class="card-text">Provincia: {{$instrumento->state }}</p>
                                            <p class="card-text"><small class="text-muted"></small>
                                            </p>
                                        {{-- <div class="card-body text-center"> --}}
                                            <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-outline"><a
                                                    href="#{{ $instrumento->id }}">{{ 'Más detalle' }}</a></button>
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
@endsection
