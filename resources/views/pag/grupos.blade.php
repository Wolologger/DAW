@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Grupos') }}</div>
                    @if ($grupos->count() <= 0)
                    
                    <h5 class="text-center">No existen registros</h5>
    
                    @else
                    {{-- <div class="container"> --}}
                        <div class="row justify-content-center">
                            <form method="POST" action="{{ route('grupos_filtro') }}">
                                @csrf
                            <div class="col">
                                <strong>Busca</strong>
                                <select name='musico'>
                                <option value="">Escoge Músico</option>
                                @foreach ($musicos as $musico)
                                    <option value="{{$musico->search}}">{{$musico->search}}</option>
                                 @endforeach
                                </select>
                            </div>
                            <div class="col">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="nombre">
                                    {{-- <select name='nombre2'>
                                    <option value="">Escoge Grupo</option>
                                    @foreach ($nombres as $nombre)
                                        <option value="{{$nombre->name}}">{{$nombre->name}}</option>
                                     @endforeach
                                    </select> --}}
                                </div>
                                <div class="col">
                                    <strong>Género musical</strong>
                                    <select name='genero'>
                                    <option value="">Escoge género</option>
                                    @foreach ($generos as $genero)
                                        <option value="{{$genero->gender}}">{{$genero->gender}}</option>
                                     @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <strong>Provincia:</strong>
                                    <select name='provincia'>
                                        <option value="" selected>Elige provincia</option>
                                        @foreach ($provincias as $provincia)
                                        <option value="{{$provincia->state}}">{{$provincia->state}}</option>
                                     @endforeach
                                        
                                        <option>Cantabria</option>
                                    </select>
                                </div>
                                <div class="col border">
                                    <div class="d-grid gap-2 border rounded-circle">
                                        <button type="submit" class="btn btn-primary text-secondary"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                </div>
                            </form>
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
                                            <p class="card-text"><strong>Busca:</strong> {{ $grupo->search }}</p>
                                            <p class="card-text"><strong>Género muscial:</strong> {{ $grupo->gender }}</p>
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
