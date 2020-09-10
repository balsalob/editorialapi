@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-center mb-5">Crear Nuevo Comic</h2>


        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form method="POST" action="{{ route('comics.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="name">Titulo Comic</label>
    
                        <input type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror "
                            id="name"
                            placeholder="Titulo Comic"
                            value={{ old('name') }}
                        >
    
                        @error('titunamelo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Agregar Comic" >
                    </div>
    
                </form>
            </div>
        </div>
</div>

</div>

@endsection