@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Grupos') }}</div>

                        <form method="POST" action="{{ route('grupos_filtro') }}">
                            @csrf
                            <div class="container">
                                <div class="row justify-content-center">

                                    <div class="col-md-2 p-1 text-center">
                                        <input type="text" name="nombre" list="nombresGrupos" class="form-control"
                                            placeholder="Grupo">
                                        <datalist id="nombresGrupos">
                                            @foreach ($grupos as $grupo)
                                                <option value="{{ $grupo->name }}">
                                            @endforeach
                                    </div>

                                    <div class="col-md-auto p-1 text-center">
                                        <select name='musico' class="form-select">
                                            <option value="">Músico</option>
                                            @foreach ($musicos as $musico)
                                                <option value="{{ $musico->search }}">{{ $musico->search }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-auto p-1 text-center">

                                        <select name='provincia' class="form-select">
                                            <option value="" selected>Provincia</option>
                                            @foreach ($provincias as $provincia)
                                                <option value="{{ $provincia->state }}">{{ $provincia->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-auto p-1 text-center">
                                        <select name='genero' class="form-select">
                                            <option value="">Género</option>
                                            @foreach ($generos as $genero)
                                                <option value="{{ $genero->gender }}">{{ $genero->gender }}</option>
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
                        </form>
                        
                        @if ($grupos->count() <= 0)
                        <h5 class="text-center">No existen registros</h5>
                        @else
                        <div class="card-body">
                            <div class="card mb-3 border">
                                <div class="row g-0">
                                    @foreach ($grupos as $grupo)
                                        {{-- <div class="col-md-4 border"> --}}
                                        <div class="col-md-6 ">
                                            <div class="card-body">

                                                <img class="img-fluid rounded"
                                                    src="assets/img/portfolio/thumbnails/grupo.jpg" alt="..." />
                                            </div>

                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="card-body">
                                                {{-- <h4>Tipo: {{ $instrumento->type }}</h4> --}}

                                                <h5 class="card-title">Grupo:
                                                    {{ $grupo->name }}</h5>
                                                <p class="card-text"><strong>Provincia:</strong> {{ $grupo->state }}</p>
                                                <p class="card-text"><strong>Busca:</strong> {{ $grupo->search }}</p>
                                                <p class="card-text"><strong>Género muscial:</strong> {{ $grupo->gender }}
                                                </p>
                                                <p class="card-text"><strong>Contacto:</strong> {{ $grupo->contact }}</p>
                                                <p class="card-text"><strong>Descripcion:</strong> {{ $grupo->body }}</p>
                                                </p>
                                                {{-- <div class="card-body text-center"> --}}
                                                <form method="POST"
                                                    action="{{ route('user.grupos.details', $grupo->id) }}">
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
    </div>
@endsection
