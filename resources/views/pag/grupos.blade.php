@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Grupos') }}</div>

                    {{-- <div class="container"> --}}
                        <div class="row justify-content-center">
                            <div class="col">
                                <strong>Search:</strong>
                                <select>
                                    <option>Guitarrista</option>
                                </select>
                            </div>
                            <div class="col">
                                    <strong>Nombre:</strong>
                                    <select>
                                        <option>Yamaha</option>
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
                                @foreach ($grupos as $grupo)
                                    {{-- <div class="col-md-4 border"> --}}
                                    <div class="col-md-6 ">
                                        <div class="card-body">

                                        <img class="img-fluid rounded" src="assets/img/portfolio/thumbnails/grupo.jpg"
                                            alt="..." />
                                    </div>

                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="card-body">
                                            {{-- <h4>Tipo: {{ $instrumento->type }}</h4> --}}

                                            <h5 class="card-title">Grupo:
                                                {{ $grupo->name}}</h5>
                                            <p class="card-text"><strong>Provincia:</strong> {{ $grupo->state }}</p>
                                            <p class="card-text"><strong>Contacto:</strong> {{ $grupo->contact }}</p>
                                            <p class="card-text"><strong>Descripcion:</strong> {{ $grupo->body }}</p>
                                            </p>
                                            {{-- <div class="card-body text-center"> --}}
                                            <form method="POST"
                                                action="{{ route('user.compraventa.details', $grupo->id) }}">
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
