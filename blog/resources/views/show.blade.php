@extends('partials.base')

@section('content')
    <h1 class="text-center">Visualizar</h1>
    <hr>
    
    <div class="col-12 m-auto">
        {{-- @php
            $user = $book->find($book->id)->relUsers;    
        @endphp --}}

        <h1>Titulo: {{ $book->title }}</h1>
        <h1>Páginas: {{ $book->pages }}</h1>
        <h1>Preço: {{ $book->price }}</h1>
        <h1>Autor: {{ $user->name }}</h1>
        <h1>Email do autor: {{ $user->email }}</h1>
    </div>
@endsection