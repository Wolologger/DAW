@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Compra Venta de Intrumentos') }}</div>
                    <div class="card-body">
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
