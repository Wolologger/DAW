@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>

                    {{-- <div class="container"> --}}
                    <div class="row justify-content-center text-center">
                        <div class="col-0">
                            <strong>Titulo:</strong>
                            <select>
                                <option>Yamaha</option>
                            </select>
                        </div><p>
                        <div class="col-0">
                            <strong>Tipo:</strong>
                            <select>
                                <option>Cantabria</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card mb-3 border">
                        <div class="row g-0">
                            @foreach ($tutoriales as $tutorial)
                                {{-- <div class="col-md-4 border"> --}}
                                <div class="col-md-6 ">
                                    <div class="card-body">

                                        <img class="img-fluid rounded" src="assets/img/portfolio/thumbnails/2.jpg"
                                            alt="..." />
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="card-body">
                                        <h5 class="card-title">Tutorial:
                                            {{ $tutorial->name }}</h5>
                                        <p class="card-text"><strong>Tipo:</strong> {{ $tutorial->type }}</p>
                                        <p class="card-text"><strong>Resumen:</strong> {{ $tutorial->extract }}</p>
                                        </p>
                                        <form method="POST" @csrf <div class="d-grid gap-2 border rounded">
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
