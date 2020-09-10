@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <h1>{{$comic->name}}</h1>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($paginas as $pagina)

            <tr>
                <td>
                    <a href="{{ route('paginas.show', ['pagina' => $pagina->id]) }} ">
                        {{$pagina->url}}
                    </a>
                </td>
                <td>
                    <a href="{{ route('paginas.edit', ['pagina' => $pagina->id]) }} " class="btn btn-dark d-block mb-2">Editar</a>
                </td>
                <td>
                    <form action="{{ route('paginas.destroy', $pagina->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger d-block">Eliminar</button>
                    </form>
                </td>
            </tr>
        
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('paginas.create', ['comic' => $comic->id]) }}">
        <button type="button" class="btn btn-primary">Nueva página</button>
    </a>
</div>

@endsection