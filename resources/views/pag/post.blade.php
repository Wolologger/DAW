@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>

                    {{-- <div class="container"> --}}
                        <div class="row justify-content-center">
                            <div class="col">
                                <strong>Fecha:</strong>
                                <select>
                                    <option>Guitarrista</option>
                                </select>
                            </div>
                            <div class="col">
                                    <strong>Titulo:</strong>
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
                                @foreach ($posts as $post)
                                    {{-- <div class="col-md-4 border"> --}}
                                    <div class="col-md-6 ">
                                        <div class="card-body">

                                        <img class="img-fluid rounded" src="assets/img/portfolio/thumbnails/1.jpg"
                                            alt="..." />
                                    </div>
                                </div>

                                    <div class="col-md-6 ">
                                        <div class="card-body">
                                            {{-- <h4>Tipo: {{ $instrumento->type }}</h4> --}}

                                            <h5 class="card-title">Post:
                                                {{ $post->name}}</h5>
                                            <p class="card-text"><strong>Resumen:</strong> {{ $post->extract }}</p>
                                            </p>
                                            {{-- <div class="card-body text-center"> --}}
                                            <form method="POST"
                                                {{-- action="{{ route('user.posts.details', $post->id) }}"> --}}>
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
