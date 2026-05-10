@extends('modelo.paginaInicio')

@section('conteudo')
    <x-dynamic-table 
    :tableName="'Clientes'" 
    :columns="[
        'id' => 'ID', 
        'name' => 'Nome', 
        'email' => 'Email', 
        'role' => 'Tipo de acesso',
    ]" 
    :records="$usuarios"
    editRoute="clientes.edit" 
    deleteRoute="clientes.destroy" 
    createRoute="clientes.create" 
    />

@endsection

@extends('modelo.paginaFim')