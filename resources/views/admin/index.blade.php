{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Compra Venta de Intrumentos') }}</div>

                <div class="card-body">

                <button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block" onclick="location.href='{{ url()->previous() }}';">   
                    Atrás
                </button>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}
 @extends('adminlte::page')

 @section('title', 'Your Band Music - Admin')
 
 @section('content_header')
     <h1>Dashboard</h1>
 @stop
 
 @section('content')
     <p>Welcome to this beautiful admin panel.</p>
 @stop
 
 @section('css')
     <link rel="stylesheet" href="/css/admin_custom.css">
 @stop
 
 @section('js')
     <script> console.log('Hi!'); </script>
 @stop