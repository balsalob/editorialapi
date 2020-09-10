@extends('layouts.app')

@section('content')

<div class="container">
    <img src="{{ asset("storage/$pagina->url" )}}" alt="">
</div>

@endsection