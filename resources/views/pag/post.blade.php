@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Posts') }}</div>


                    <form method="POST" action="{{ route('posts_filtro') }}">
                        @csrf
                        <div class="container">
                            <div class="row justify-content-center">

                                <div class="col-md-auto p-1 text-center">
                                    <input type="date" name="fecha" class="form-control">
                                </div>

                                <div class="col-md-auto p-1 text-center">
                                    <input type="text" name="titulo" class="form-control" placeholder="Titulo">
                                </div>

                                <div class="col-md-auto p-1 text-center">
                                    <input type="text" name="category" class="form-control" placeholder="Categoria">
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

                    @if ($posts->count() <= 0)
                    <h5 class="text-center">No existen registros</h5>
                    @else
                                        
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

                                            <h5 class="card-title">
                                                {{ $post->name}}</h5>
                                            <p class="card-text"><strong>Categoria:</strong> {{ $post->category }}</p>
                                            <p class="card-text"><strong>Resumen:</strong> {{ $post->extract }}</p>
                                            <p class="card-text"><strong>Fecha:</strong> {{ date('d-m-Y', strtotime($post->created_at)) }}</p>

                                            </p>
                                            <form method="POST"
                                                action="{{ route('user.posts.details', $post->id) }}">
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
