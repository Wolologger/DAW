@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('posts') }}</div>

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