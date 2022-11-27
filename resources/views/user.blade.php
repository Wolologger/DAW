@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <strong>
                                <i class="bi bi-music-note-beamed"></i>
                                {{ __('Hola') }} {{ Auth::user()->name }}
                                <i class="bi bi-music-note-beamed"></i>
                            </strong>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row  no-gutters">
                                {{-- Opcion --}}
                                <div class="col-6 col-md-4">
                                    <button type="button" name="" id="" class="btn btn-info" btn-lg
                                        btn-block">
                                        <i class="bi bi-person-circle">
                                            <h5>Perfil</h5>
                                        </i>
                                    </button>
                                </div>

                                {{-- opcion --}}
                                <div class="col-6 col-md-4">
                                    <button type="button" name="" id="" class="btn btn-success" btn-lg
                                        btn-block">
                                        <i class="bi bi-file-post">
                                            <h5>Mis posts</h5>
                                        </i>
                                    </button>
                                </div>

                                {{-- opcion --}}
                                <div class="col-6 col-md-4">
                                    <button type="button" name="" id="" class="btn btn-secondary" btn-lg
                                        btn-block">
                                        <i class="bi bi-file-earmark-binary">
                                            <h5>lorem ipsum</h5>
                                        </i>
                                    </button>
                                </div>
                                <hr class="divider-light" />

                                {{-- opcion --}}
                                <div class="col-6 col-md-4">
                                    <button type="button" name="" id="" class="btn btn-warning" btn-lg
                                        btn-block">
                                        <i class="bi bi-inbox">
                                            <h5>lorem ipsum</h5>
                                        </i>
                                    </button>
                                </div>

                                {{-- opcion --}}
                                <div class="col-6 col-md-4">
                                    <button type="button" name="" id="" class="btn btn-danger" btn-lg
                                        btn-block">
                                        <i class="bi bi-file-post">
                                            <h5>lorem ipsum</h5>
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="dropdown-item " href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                        <div class="text-center">
                            {{ __('Desconectarse') }}
                        </div>

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
