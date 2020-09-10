@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h1>Jackson Editorial</h1>
    </div>
</div>
<div class="card-body">
    @guest
        <div class="row justify-content-center">
            <h1>Registrate</h1>
        </div>
    @else
        <div class="row justify-content-center">
            <a href="{{ route('comics.index') }}">
                <button type="button" class="btn btn-primary">Comics</button>
            </a>            
        </div>
    @endguest
</div>
@endsection