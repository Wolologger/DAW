@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Tutoriales') }}</div>
                    {{-- <div class="container"> --}}
                    <div class="row justify-content-center text-center">


                        <form method="POST" action="{{ route('tutoriales_filtro') }}">
                            @csrf
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-auto p-1 text-center">
                                        <input type="text" name="titulo" class="form-control"
                                            placeholder="Nombre del tutorial">
                                    </div>
                                    <div class="col-md-auto p-1 text-center">
                                        <select name="tipo" class="form-select">
                                            <option value="">Tipo</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->type }}">{{ $tipo->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-auto p-1 text-center">
                                        <div class="d-grid gap-2 border rounded-pill border-primary">
                                            <button type="submit" class="btn btn-link border-0 text-decoration-none"><i
                                                    class="bi bi-search text-primary"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    @if ($tutoriales->count() <= 0)
                        <h5 class="text-center">No existen registros</h5>
                    @else
                        <div class="card-body">
                            <div class="card mb-3 border">
                                <div class="row g-0">
                                    @foreach ($tutoriales as $tutorial)
                                        {{-- <div class="col-md-4 border"> --}}
                                        <div class="col-md-6 ">
                                            <div class="card-body">

                                                @if ($tutorial->image)
                                                    <img src="{{ asset($tutorial->image->url) }}"
                                                        alt="{{ $tutorial->name }}" class="img-fluid">
                                                @else
                                                <img class="img-fluid rounded" src="assets/img/portfolio/thumbnails/2.jpg"
                                                    alt="..." />
                                                    <p>
                                                @endif
                                                {{-- {{$tutorial->image->id}} --}}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ $tutorial->name }}</h5>
                                                <p class="card-text"><strong>Tipo:</strong> {{ $tutorial->type }}
                                                </p>
                                                <p class="card-text"><strong>Resumen:</strong>
                                                    {{ $tutorial->extract }}</p>
                                                </p>

                                                <form method="POST"
                                                    action="{{ route('user.tutoriales.details', $tutorial->id) }}">
                                                    @csrf
                                                    <div class="d-grid gap-2 border rounded">
                                                        <button type="submit"
                                                            class="btn btn-outline text-primary">{{ 'Más detalle' }}</a></button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
