@extends('modelo.paginaInicio')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">Editar Livro</h3>
            </div>
        </div>
        <form action="{{ route('livros.update', $livro->id) }}" method="POST">
            @method('PUT')
            @csrf
            @include('livros.formulario')
        </form>
    </div>
@endsection
@extends('modelo.paginaFim')