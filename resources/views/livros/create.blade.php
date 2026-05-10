@extends('modelo.paginaInicio')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3"></h3>
                <h3 class="mb-3">Criar Livro</h3>
            </div>
        </div>
        <form action="{{ route('livros.store') }}" method="POST">
                @csrf
                @include('livros.formulario')
        </form>
    </div>
@endsection
@extends('modelo.paginaFim')