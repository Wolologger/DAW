@extends('layouts.app')
@section('content')
    @php
        // $i = auth()->id()
        $user = Auth::user();
        
    @endphp
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <strong>
                                <i class="bi bi-music-note-beamed"></i>
                                {{-- {{ __('Hola') }} {{ Auth::user()->name }} --}}
                                Dashboard
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
                        <div class="row row-cols-2 justify-content-center">
                            <div class="col-md-auto p-1">
                                {{-- Opcion --}}
                                <form method="POST" action="{{ route('profile') }}">
                                    @csrf
                                    <button type="submit" name="" id="" class="btn btn-info" btn-lg
                                        btn-block">
                                        <i class="bi bi-person-circle">
                                            <h5>Mi Perfil</h5>
                                        </i>
                                    </button>
                                </form>
                            </div>
                            {{-- opcion --}}
                            <div class="col-md-auto p-1">
                                <form method="POST" action="{{ route('user.posts', $user) }}">
                                    @csrf
                                    <button type="submit" name="" id="" class="btn btn-success" btn-lg
                                        btn-block">
                                        <i class="bi bi-file-post">
                                            <h5>Mis posts</h5>
                                        </i>
                                    </button>
                                </form>
                            </div>

                            {{-- opcion --}}


                            {{-- <hr class="divider-light" /> --}}

                            {{-- opcion --}}
                            <div class="col-md-auto p-1">
                                <form method="POST" action="{{ route('user.tutoriales', $user) }}">
                                    @csrf
                                    <button type="submit" name="" id="" class="btn btn-warning" btn-lg
                                        btn-block">
                                        <i class="bi bi-display">
                                            <h5>Mis tutoriales</h5>
                                        </i>
                                    </button>
                                </form>
                            </div>

                            <div class="col-md-auto p-1">
                                <form method="POST" action="{{ route('user.grupos', $user) }}">
                                    @csrf
                                    <button type="submit" name="" id="" class="btn btn-primary" btn-lg
                                        btn-block">
                                        <i class="bi bi-people-fill">
                                            <h5>Mis grupos</h5>
                                        </i>
                                    </button>
                                </form>
                            </div>

                            <div class="col-md-auto p-1">
                                <form method="POST" action="{{ route('user.compraventa', $user) }}">
                                    @csrf
                                    <button type="submit" name="" id="" class="btn btn-secondary" btn-lg
                                        btn-block">
                                        <i class="bi bi-recycle">
                                            <h5>Mis compraventa</h5>
                                        </i>
                                    </button>
                                </form>
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
