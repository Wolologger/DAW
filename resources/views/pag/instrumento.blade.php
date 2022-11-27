@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('$instrumento') }}</div>

                    <div class="card-body">

                        <button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block"
                            onclick="location.href='{{ url()->previous() }}';">
                            Atrás
                        </button>

                        <h4>Marca: </h4>
                        <h4>Precio: </h4>
                        <h4>Estado: </h4>
                        <h4>Usuario: </h4>
                        <h4>Localidad: </h4>
                        <h4> </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
