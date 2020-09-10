@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h1>COMICS</h1>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($comics as $comic)

                <tr>
                    <td>
                        <a href="{{ route('comics.show', ['comic' => $comic->id]) }} ">
                            {{$comic->name}}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('comics.edit', ['comic' => $comic->id]) }} " class="btn btn-dark d-block mb-2">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('comics.destroy',$comic->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger d-block">Eliminar</button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>
    <a href="{{ route('comics.create') }}">
        <button type="button" class="btn btn-primary">Nuevo comic</button>
    </a>
</div>

@endsection