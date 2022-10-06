@extends('partials.base')

@section('content')

    @if (isset($book))
        <h1 class="text-center">Editar Livro</h1>
    @else
        <h1 class="text-center">Cadastrar novo livro</h1>
    @endif

    <hr>

    <div class="col-8 m-auto">
        @if (@isset($errors) && count($errors) > 0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">    
                @foreach ($errors->all() as $erro)
                    {{ $erro }}<br>
                    
                @endforeach
            </div>
        @endif
    </div>
    
    <div class="col-12 m-auto">

        @if (isset($book))
            <form class="formCad" id="formcad" method="PUT" action="{{ url ("books/update/$book->id") }}">
        @else
            <form class="formCad" id="formcad" method="POST" action="{{ url ('books/store') }}" >
        @endif

            @csrf
            <input class="form-control" type="text" name="title" id="title" value="{{ $book->title ?? '' }}" placeholder="Titulo"><br>
            
            <select class="form-control" name="id_user" id="id_user">
                @foreach ($users as $user)
                    @if (isset($book))
                        @if ($user->id == $book->id_user)
                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select><br>

            <input class="form-control" type="text" name="pages" id="pages" value="{{ $book->pages ?? '' }}" placeholder="Páginas"><br>
            <input class="form-control" type="text" name="price" id="price" value="{{ $book->price ?? '' }}" placeholder="Preço"><br>
            <a class="btn btn-primary" href="{{ url('books/') }}" role="button">Voltar</a>

            @if (isset($book))
                <button class="btn btn-primary" type="submit" value="Editar">Editar</button>
            @else
                <button class="btn btn-primary" type="submit" value="Cadastrar">Cadastrar</button>
            @endif
        </form>
    </div>
@endsection