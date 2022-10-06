@extends('partials.base')

@section('content')
    <h1 class="text-center">Crud</h1>
    <hr>
    
    <div class="container mt- mb-4">
        <a href="{{ url ('books/create') }}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>

    <div class="col-12 m-auto">
        @csrf
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Preço</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
            </thead>
            <tbody>
                {{-- Jeito 1 --}}
                {{-- @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }} </th>
                        <td>{{ $book->title }} </td>
                        <td>{{ $book->relUsers->name }} </td>
                        <td>{{ $book->price }} </td>
                    </tr>
                @endforeach --}}

                {{-- Jeito 2 --}}
                @foreach ($books as $book)
                    @php
                        $user = $books->find($book->id)->relUsers;
                    @endphp
                    <tr>
                        <th scope="row">{{ $book->id }} </th>
                        <td><a href="{{ url ("books/$book->id") }}">{{ $book->title }}</a></td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $book->price }} </td>
                        <td>
                            <a href="{{ url ("books/$book->id/edit") }}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                        </td>
                        <td>
                            <form action="books/delete/{{ $book->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection