@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Compra Venta de Intrumentos') }}</div>

                    {{-- <div class="container"> --}}
                        <div class="row justify-content-center">
                            <div class="col">
                                <strong>Tipo:</strong>
                                <select>
                                    <option>Guitarra</option>
                                </select>
                            </div>
                            <div class="col">
                                    <strong>Marca:</strong>
                                    <select>
                                        <option>Yamaha</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <strong>Estado:</strong>
                                    <select>
                                        <option>Excelente</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <strong>Provincia:</strong>
                                    <select>
                                        <option>Cantabria</option>
                                    </select>
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card mb-3 border">
                            <div class="row g-0">
                                @foreach ($compraventa as $instrumento)
                                    {{-- <div class="col-md-4 border"> --}}
                                    <div class="col-md-6 ">

                                        <img class="img-fluid rounded" src="assets/img/portfolio/thumbnails/pacifica.jpg"
                                            alt="..." />
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="card-body">
                                            {{-- <h4>Tipo: {{ $instrumento->type }}</h4> --}}

                                            <h5 class="card-title">Instrumento:
                                                {{ $instrumento->brand . ' ' . $instrumento->model }}</h5>
                                            <p class="card-text">Tipo: {{ $instrumento->type }} €</p>
                                            <p class="card-text">Precio: {{ $instrumento->price }} €</p>
                                            <p class="card-text">Estado: {{ $instrumento->state_product }}</p>
                                            <p class="card-text">Provincia: {{ $instrumento->state }}</p>
                                            </p>
                                            {{-- <div class="card-body text-center"> --}}
                                            <form method="POST"
                                                action="{{ route('user.compraventa.details', $instrumento->id) }}">
                                                @csrf
                                                <div class="d-grid gap-2 border rounded">
                                                    <button type="submit"
                                                        class="btn btn-outline text-primary">{{ 'Más detalle' }}</a></button>
                                                </div>
                                            </form>

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
