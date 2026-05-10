@extends('modelo.paginaInicio')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3"></h3>
                <h3 class="mb-3">Editar Usuário</h3>
            </div>
        </div>
        <form action="{{ route('clientes.update', $usuario->id) }}" method="POST">
            @method('PUT')
            @csrf
            @include('clientes.formulario')
        </form>
    </div>
@endsection
@extends('modelo.paginaFim')