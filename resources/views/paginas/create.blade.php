@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <h2 class="text-center">Crear Nueva Página del comic {{$comic->name}}</h2>
    </div>
        <div>
            <form method="POST" action="{{ route('paginas.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <label for="archivo"><b>Archivo: </b></label><br>
                <input type="file" name="archivo" required>

                <input type="hidden" name="id" id="id" value="{{$comic->id}}"/>
    
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Comic" >
                </div>
    
            </form>
        </div>




</div>

@endsection